<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Admin;
use App\Models\Master;
use App\Http\Requests\AdminRequest;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    /**
     * 登録画面表示
     */
    public function registerForm()
    {
        return view('auth.register');
    }

    /**
     * 新規登録処理
     */
    protected function register(AdminRequest $request)
    {
        $params = $request->input();
        $params['master_id'] = Master::where('administrator', 1)->first()->id;
        Admin::create($params);
        //リダイレクトさせるルート
        $route_name = $this->_guard . '.home';
        return redirect()->route($route_name);
    }
}
