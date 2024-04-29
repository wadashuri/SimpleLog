<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Log;

class GoogleLoginController extends Controller
{
    protected $_guard;

    public function __construct()
    {
        if (request()->route()) {
            # ルート名から現在のguard名を取得
            $route = explode('.', request()->route()->getName());
            $this->_guard = $route[0];
        }
    }

    // protected function redirectTo()
    // {
    //     //ガード値からルートネームでトップへ
    //     return route($this->_guard . '.home');
    // }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $socialiteUser = Socialite::driver('google')->user();
            $email = $socialiteUser->email;

            $user = Admin::firstOrCreate(['email' => $email], [
                'name' => $socialiteUser->name,
            ]);

            Auth::login($user);

            #ログインログを保存
            auth('admin')->user()->update(['last_login_at' => now()]);

            return redirect()->route('admin.home');
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}

