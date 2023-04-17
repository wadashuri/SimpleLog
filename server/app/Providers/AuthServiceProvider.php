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

            // 管理者権限設定
            Gate::define('administrator',function($user){
                return $user->administrator === 10;
            });


            Gate::define('plan',function($admin){

                $user_count = $admin->users()->count();
                $stripe_price = '';
                if($admin->subscriptions->isNotEmpty()){
                   $stripe_price = $admin->subscriptions()->first()->stripe_price;
                }
                $plan_name = config('services.stripe.plan_name');

                if ($plan_name['スタンダード'] === $stripe_price){
                    return $user_count < 20;
                }
                if ($plan_name['プレミアム'] === $stripe_price){
                    return $user_count < 50;
                }
                if ($plan_name['プロ'] === $stripe_price){
                    return $user_count < 150;
                }

                return true;
            });
        }
}
