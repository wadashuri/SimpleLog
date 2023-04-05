<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;



# リダイレクト設定
Route::get('/', function () {
    return redirect()->route('user.login');
});

/**
 * master
 */
Route::group(['prefix' => 'master', 'as' => 'master.',], function () {
    # login
    Route::get('/login', [Auth\LoginController::class, 'loginForm'])->name('login_form');
    Route::post('/login', [Auth\LoginController::class, 'login'])->name('login');

    # logged
    Route::group(['middleware' => 'auth:master'], function () {
        Route::get('/', function () {
            return redirect()->route('master.index');
        })->name('home');

        # Home
        Route::get('/', [Master\HomeController::class, 'home'])->name('home');

        # Admin
        Route::resource('admin', Master\AdminController::class);

        # logout
        Route::match(['get', 'post'], '/logout', [Auth\LoginController::class, 'logout'])->name('logout');
    });
});

/**
 * admin
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.',], function () {
    # login
    Route::get('/login', [Auth\LoginController::class, 'loginForm'])->name('login_form');
    Route::post('/login', [Auth\LoginController::class, 'login'])->name('login');

    # logged
    Route::group(['middleware' => 'auth:admin'], function () {

        # Home
        Route::get('/', [Admin\HomeController::class, 'home'])->name('home');

        # User
        Route::resource('user', Admin\UserController::class);

        # グループ
        Route::resource('group', Admin\GroupController::class)->only('create', 'store', 'update', 'destroy');

        # 顧客
        Route::resource('customer', Admin\CustomerController::class)->only('create', 'store', 'update', 'destroy');

        # logout
        Route::match(['get', 'post'], '/logout', [Auth\LoginController::class, 'logout'])->name('logout');
    });
});

/**
 * user
 */
Route::group(['prefix' => 'user', 'as' => 'user.',], function () {
    #login
    Route::get('/login', [Auth\LoginController::class, 'loginForm'])->name('login_form');
    Route::post('/login', [Auth\LoginController::class, 'login'])->name('login');

    # logged
    Route::group(['middleware' => 'auth:user'], function () {
        Route::get('/', function () {
            return redirect()->route('user.index');
        })->name('home');

        # Home
        Route::get('/', [User\HomeController::class, 'home'])->name('home');

        # logout
        Route::match(['get', 'post'], '/logout', [Auth\LoginController::class, 'logout'])->name('logout');
    });
});
