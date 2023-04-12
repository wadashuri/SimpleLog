<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    // 課金を実行
    public function subscribe(Request $request)
    {

        $admin = $request->user();

        if (!$admin->subscribed('main')) {

            $payment_method = $request->payment_method;
            $plan = $request->plan;
            $admin->newSubscription('main', $plan)->create($payment_method);
            $admin->load('subscriptions');
        }

        return $this->status();
    }

    // 課金をキャンセル
    public function cancel(Request $request)
    {

        $request->user()
            ->subscription('main')
            ->cancel();
        return $this->status();
    }

    // キャンセルしたものをもとに戻す
    public function resume(Request $request)
    {

        $request->user()
            ->subscription('main')
            ->resume();
        return $this->status();
    }

    // プランを変更する
    public function change_plan(Request $request)
    {

        $plan = $request->plan;
        $request->user()
            ->subscription('main')
            ->swap($plan);
        return $this->status();
    }

    // カードを変更する
    public function update_card(Request $request)
    {

        $payment_method = $request->payment_method;
        $request->user()
            ->updateDefaultPaymentMethod($payment_method);
        return $this->status();
    }

    // 課金状態を返す
    public function status()
    {

        $status = 'unsubscribed';
        $user = auth()->user();
        $details = [];

        if ($user->subscribed('main')) { // 課金履歴あり

            if ($user->subscription('main')->cancelled()) {  // キャンセル済み

                $status = 'cancelled';
            } else {    // 課金中

                $status = 'subscribed';
            }

            $subscription = $user->subscriptions->first(function ($value) {

                return ($value->name === 'main');
            })->only('ends_at', 'stripe_price');

            $details = [
                'end_date' => ($subscription['ends_at']) ? $subscription['ends_at']->format('Y-m-d') : null,
                'plan' => \Arr::get(config('services.stripe.plans'), $subscription['stripe_price']),
                'card_last_four' => $user->card_last_four
            ];
        }

        return [
            'status' => $status,
            'details' => $details
        ];
    }
}
