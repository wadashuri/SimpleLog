<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $_guard;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (request()->route()) {
            # ルート名から現在のguard名を取得
            $route = explode('.', request()->route()->getName());
            $this->_guard = $route[0];
        }
    }

    protected function redirectTo()
    {
        //ガード値からルートネームでトップへ
        return route($this->_guard . '.home');
    }

    /**
     * ログイン画面表示
     */
    public function loginForm(Request $request)
    {
        return view('auth.login');
    }

    /**
     * ログイン処理
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        //リダイレクトさせるルート
        $route_name = $this->_guard . '.home';

        if (auth($this->_guard)->attempt($credentials, $request->filled('remember'))) {
            return redirect()->route($route_name);
        }
        return back()->withInput($credentials)->withErrors([
            'password' => ['認証に失敗しました。']
        ]);
    }

    /**
     * ログアウト処理
     * memberログアウト時customerに値が入る
     */
    public function logout()
    {
        auth($this->_guard)->logout();
        return redirect()->route($this->_guard . '.login');
    }
}
