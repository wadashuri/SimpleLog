<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReportMail;
use App\Mail\ContactSendMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('front.contact.index');
    }

    public function confirm(ContactRequest $request)
    {
        return view('front.contact.confirm')->with([
            'params' => $request->except('_token'),
        ]);
    }

    public function send(ContactRequest $request)
    {
        $action = $request->get('action');
        $params = $request->except('_token');

        // 戻るボタンが押された場合
        if ($action === 'back') {
            return redirect()->route('front.contact.index')->withInput($params);
        }

        // 名前とフリガナをスペース区切りに変更
        $params['name'] = $params['last_name'] . ' ' . $params['first_name'];
        $params['ruby'] = $params['last_name_ruby'] . ' ' . $params['first_name_ruby'];

        // 余分な値の削除
        unset(
            $params['last_name'],
            $params['first_name'],
            $params['last_name_ruby'],
            $params['first_name_ruby'],
        );

        Mail::to($params['email'])->send(new ContactSendMail($params));
        Mail::to(explode(',', config('mail.report.address')))->send(new ContactReportMail($params));

        return view('front.contact.thanks');
    }
}
