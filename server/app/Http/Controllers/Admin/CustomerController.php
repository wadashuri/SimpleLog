<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\DB;

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
}
