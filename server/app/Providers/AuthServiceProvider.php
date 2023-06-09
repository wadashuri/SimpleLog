<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        # master管理者権限設定
        Gate::define('master_admin', function ($master) {
            return $master->administrator === 1;
        });

        # 管理者権限設定
        Gate::define('administrator', function ($user) {
            return $user->administrator === 10;
        });

        # スタンダードプランのゲート定義
        Gate::define('standard', function ($admin) {
            $plan_name = config('services.stripe.plan_name');
            $stripe_price = '';
            if ($admin->subscriptions->isNotEmpty()) {
                $stripe_price = $admin->subscriptions()->first()->stripe_price;
            }
            return $plan_name['スタンダード'] === $stripe_price;
        });

        # プレミアムプランのゲート定義
        Gate::define('premium', function ($admin) {
            $plan_name = config('services.stripe.plan_name');
            $stripe_price = '';
            if ($admin->subscriptions->isNotEmpty()) {
                $stripe_price = $admin->subscriptions()->first()->stripe_price;
            }
            return $plan_name['プレミアム'] === $stripe_price;
        });

        # プロプランのゲート定義
        Gate::define('pro', function ($admin) {
            $plan_name = config('services.stripe.plan_name');
            $stripe_price = '';
            if ($admin->subscriptions->isNotEmpty()) {
                $stripe_price = $admin->subscriptions()->first()->stripe_price;
            }
            return $plan_name['プロ'] === $stripe_price;
        });

        // プランに関するゲート定義
        Gate::define('plan', function ($admin) {
            $user_count = $admin->users()->count();
            $plan_end = true;
            if($admin->subscriptions->isNotEmpty()){
                $ends_at = $admin->subscriptions()->first()->ends_at;
                $ends_at = $ends_at ? $ends_at->format('Y-m-d') : 0;
                $plan_end = $ends_at < now()->format('Y-m-d');
             }
            if (auth()->user()->can('standard')) {
                return $user_count < 50 && $plan_end;
            } elseif (auth()->user()->can('premium')) {
                return $user_count < 100 && $plan_end;
            } elseif (auth()->user()->can('pro')) {
                return $user_count < 150 && $plan_end;
            }
            return false;
        });
    }
}
