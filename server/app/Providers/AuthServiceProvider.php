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
            if (auth()->user()->can('standard')) {
                return $user_count < 50;
            } elseif (auth()->user()->can('premium')) {
                return $user_count < 100;
            } elseif (auth()->user()->can('pro')) {
                return $user_count < 150;
            }
            return false;
        });
    }
}
