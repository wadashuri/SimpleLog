<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Http\Requests\CsvRequest;

class CustomerController extends Controller
{

    protected $_customer;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->_customer = auth()->user('admin')->customers();
            return $next($request);
        });
    }


    /**
     *　顧客作成
     */
    public function create()
    {
        return view('admin.customer.create', [
            'customers' => $this->_customer->latest()->paginate(10)
        ]);
    }

    /**
     *　顧客登録
     */
    public function store(CustomerRequest $request)
    {
        try {
            $params = $request->input();

            DB::transaction(function () use ($params) {
                $this->_customer->create($params);
            });

            return redirect()->route('admin.customer.create')->with([
                'alert' => [
                    'message' => '顧客の登録が完了しました。',
                    'type' => 'success'
                ]
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
    }

    /**
     *　顧客更新
     */
    public function update(CustomerRequest $request)
    {
        try {
            $params = $request->input();

            DB::transaction(function () use ($params) {
                $this->_customer->findOrFail(request()->route('customer'))->fill($params)->update();
            });

            return redirect()->route('admin.customer.create')->with([
                'alert' => [
                    'message' => '顧客の編集が完了しました。',
                    'type' => 'success'
                ]
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
    }

    /**
     *　顧客削除
     */
    public function destroy()
    {
        try {
            DB::transaction(function () {
                $this->_customer->findOrFail(request()->route('customer'))->delete();
            });

            return redirect()->route('admin.customer.create')->with([
                'alert' => [
                    'message' => '顧客の削除が完了しました。',
                    'type' => 'danger'
                ]
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
    }

    /**
     * csvエクスポート
     */
    public function exportCsv(Request $request)
    {
        return new StreamedResponse(function () use ($request) {
            $stream = fopen('php://output', 'w');
            //　文字化け回避
            stream_filter_prepend($stream, 'convert.iconv.utf-8/cp932//TRANSLIT');
            fputcsv($stream, [
                "ID",
                "顧客名"
            ]);
            $customers = $this->_customer->latest()->get();
            // 顧客ごと
            foreach ($customers as $customer) {
                $columns = [
                    $customer->id,
                    $customer->name ? $customer->name : '##',
                ];
                fputcsv($stream, $columns);
            }

            fclose($stream);
        }, 200, [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => sprintf('attachment; filename="顧客一覧_%s.csv"', date('YmdHi'))
        ]);
    }





    # 顧客CSVインポート
    public function importCsv(CsvRequest $request)
    {
        $file_path = $request->file('file')->store('private/csv_tmp'); //storageフォームの下に作成

        try {
            # ファイルの読み込み
            $file = new \SplFileObject(storage_path('app/' . $file_path));

            $file->setFlags(
                \SplFileObject::READ_CSV |     # CSV 列として行を読み込む
                \SplFileObject::READ_AHEAD |   # 先読み／巻き戻しで読み出す
                \SplFileObject::SKIP_EMPTY |   # 空行は読み飛ばす
                \SplFileObject::DROP_NEW_LINE  # 行末の改行を読み飛ばす
            );

            # CSVのヘッダーとユニコードの作成
            [$header, $unicode] = $this->makeCsvHead();

            # 事前にCSVファイルをチェック
            $previous_check_result = $this->previousErrorCheck($file, $header, $unicode);

            # Errorがあれば、インポートを中断して戻す
            if (!empty($previous_check_result)) {
                return redirect()->route('admin.customer.create')->with([
                    'alert' => [
                        'message' => implode("\n", $previous_check_result),
                        'type' => 'danger',
                    ]
                ]);
            }

            # Errorがなければ次に進む
            # 読み込んだ CSV データをループ
            foreach ($file as $key => $line) {
                # 文字コードを UTF-8 へ変換
                if (mb_detect_encoding(implode(',', $line), $unicode, true) == 'SJIS-win') {  //excelがutf--8じゃなかったらutf-8に変換
                    mb_convert_variables('UTF-8', 'sjis-win', $line);
                }
                # DB へ保存
                if ($key > 0) {
                    $this->storeCsv($line);
                }
            }
        } catch (\Exception $err) {
            return back()->with([
                'alert' => [
                    'message' => $err->getMessage(),
                    'type' => 'danger',
                ]
            ]);
            # throw $err;
        }

        unlink(storage_path('app/' . $file_path));

        return redirect()->route('admin.customer.create')->with([
            'alert' => [
                'message' => 'インポートしました。',
                'type' => 'success'
            ]
        ]);
    }

    # CSV登録
    private function storeCsv($line)
    {
        $id = $line[0];

        $params = [
            'name' => $line[1]
        ];

        # 顧客重複確認
        $customer = $this->_customer->find($id);

        # 顧客が存在すれば上書き
        if ($customer) {
            DB::transaction(function () use ($customer, $params) {
                $customer->fill($params)->update();
            });
        } else {
            DB::transaction(function () use ($params) {
                $this->_customer->create($params);
            });
        }
    }

    # 商品CSVのヘッダーとユニコードの作成
    private function makeCsvHead()
    {
        # ヘッダー項目の設定 excelの1行目タイトル
        $header = [
            'ID',
            '顧客名'
        ];

        # mb_detect_encodingはデフォルトでASCII', 'UTF-8しか確認できないため追加する
        $unicode = [
            'eucJP-win',
            'SJIS-win',
            'EUC-JP',
            'SJIS',
            'JIS'
        ];

        return [$header, $unicode];
    }

    # インポートする前、エラーをチェック
    private function previousErrorCheck($csv_file, $header, $unicode)
    {
        # 結果置き場
        $result = [];

        $max_count = 10; //表示させたい数
        $error_count = count($result); //エラー数

        foreach ($csv_file as $key => $line) {
            if (mb_detect_encoding(implode(',', $line), $unicode, true) == 'SJIS-win') {  //excelがutf--8じゃなかったらutf-8に変換
                mb_convert_variables('UTF-8', 'sjis-win', $line);
            }
            if (mb_detect_encoding(implode(',', $line)) == 'UTF-8') {  //excelがutf--8でその中でbomのbyte数削除する。
                $bom = pack('H*', 'EFBBBF'); //データをバイナリ文字列にパックする
                $line = preg_replace("/^$bom/", '', $line);
            }

            # ヘッダーチェック
            if ($key == 0 && $header !== $line) {
                # ここにヘッダチェックエラー時の処理
                # フォームからのアップロードであればヘッダーチェックは
                # リクエストクラスで実装するのがおすすめ
                array_push($result, 'ヘッダーが合致しません（例：' . implode('，', $header) . '）。');
                $error_count++;
            }

            if ($error_count > $max_count) {
                $result[] = 'エラーが多いためこれ以降のエラーは省略されました';
                break;
            }
        }

        return $result;
    }
}
