<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Laravel\Cashier\Cashier;
use App\Models\Admin;
use App\Models\Post;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        # ページネーション
        Paginator::useBootstrap();
        # 参照モデル変更
        Cashier::useCustomerModel(Admin::class);

        # footerに新しい投稿を表示
        View::composer('layouts.front.app', function ($view) {
            $footer_recent_posts = Post::latest()->take(2)->get();
            $view->with('footer_recent_posts', $footer_recent_posts);
        });
    }
}
