<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;



# リダイレクト設定
Route::get('/', function () {
    return redirect('/front/index');
});

/**
 * front
 */
Route::group([
    'prefix' => '/front',
    'as' => 'front.',
], function () {
    # index
    Route::view('/index', 'front.pages.index')->name('index');

    # about
    Route::view('/about', 'front.pages.about')->name('about');

    # services
    Route::view('/services', 'front.pages.services')->name('services');

    # work
    Route::view('/work', 'front.pages.work')->name('work');

    # team
    Route::view('/team', 'front.pages.team')->name('team');

    # pricing
    Route::view('/pricing', 'front.pages.pricing')->name('pricing');

    # blog
    Route::view('/blog', 'front.pages.blog')->name('blog');

    # contact
    Route::view('/front/contact', 'front.pages.contact')->name('contact');

    # blog_single
    Route::view('/front/blog_single', 'front.pages.blog_single')->name('blog_single');
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


        # 課金
        Route::group([
            'prefix' => '/subscription',
            'controller' => Admin\SubscriptionController::class
        ], function () {
            Route::get('/', 'index')->name('subscription');
        });

        Route::get('/status', [Admin\Ajax\SubscriptionController::class, 'status'])->name('status');
        Route::group([
            'prefix' => '/ajax/subscription',
            'as' => 'ajax.',
            'controller' => Admin\Ajax\SubscriptionController::class
        ], function () {
            Route::post('/subscribe', 'subscribe')->name('subscribe');
            Route::post('/cancel', 'cancel')->name('cancel');
            Route::post('/resume', 'resume')->name('resume');
            Route::post('/change_plan', 'change_plan')->name('change_plan');
            Route::post('/update_card', 'update_card')->name('update_card');
        });

        # ホーム
        Route::get('/', [Admin\HomeController::class, 'home'])->name('home');

        # タスク
        Route::resource('task', Admin\TaskController::class);

        # ユーザー
        Route::resource('user', Admin\UserController::class);

        # グループ
        Route::resource('group', Admin\GroupController::class)->only('create', 'store', 'update', 'destroy');

        # 顧客
        Route::resource('customer', Admin\CustomerController::class)->only('create', 'store', 'update', 'destroy');
        # csvインポート
        Route::post('/customer/import', [Admin\CustomerController::class, 'importCsv'])->name('customer.importCsv');
        # csvエクスポート
        Route::post('/customer/export', [Admin\CustomerController::class, 'exportCsv'])->name('customer.export');


        # プロジェクト
        Route::resource('project', Admin\ProjectController::class);
        # csvエクスポート
        Route::post('/project/export', [Admin\ProjectController::class, 'exportCsv'])->name('project.export');

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

        # 全体管理者がアクセスできるプロジェクトのルート
        Route::group(['middleware' => 'can:administrator'], function () {
            Route::resource('project', User\ProjectController::class)->only('store', 'update', 'destroy');
        });

        # プロジェクト
        Route::resource('project', User\ProjectController::class)->except('store', 'update', 'destroy');

        # タスク
        Route::resource('task', User\TaskController::class);

        # logout
        Route::match(['get', 'post'], '/logout', [Auth\LoginController::class, 'logout'])->name('logout');
    });
});
