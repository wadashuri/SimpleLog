<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Laravel\Cashier\Cashier;

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
        Cashier::useCustomerModel(App\Models\Admin::class);
        # 税金自動計算有効
        Cashier::calculateTaxes();
    }
}
