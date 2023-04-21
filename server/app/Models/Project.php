<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // ========================================================================

    /**
     * リレーション設定
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * スコープ設定
     */
    public function scopeSearchProject($query, $request)
    {
        # インスタンス生成
        $end_time = new Carbon($request->end);

        $query
            ->with(['admin'])
            ->when($request->filled('customer_id'), function ($q) use ($request) {
                $q->where('customer_id', $request->customer_id);
            })
            ->when($request->filled('start'), function ($q) use ($request) {
                $q->where('date', '>=', $request->start);
            })
            ->when($request->filled('end'), function ($q) use ($end_time) {
                $q->where('date', '<', $end_time->addDays(1));
            })
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->Where('customer_manager', 'LIKE', '%' . $request->search . '%');
            });
    }

    /**
     * 関数
     */

    # プロジェクトに参加しているユーザーと管理者の総数
    function totalUserCount()
    {
        # プロジェクトに参加しているユーザーの数を取得
        $userCount = $this->tasks()->whereNotNull('user_id')->distinct('user_id')->count();

        # プロジェクトに参加している管理者の数を取得
        $adminCount = $this->tasks()->whereNotNull('admin_id')->distinct('admin_id')->count();

        # 全てのユーザーの総数を計算
        $totalUserCount = $userCount + $adminCount;

        return $totalUserCount;
    }

    # 生産性計算
    function productivity()
    {
        # プロジェクトに参加しているユーザーと管理者の総数を取得
        $totalUserCount = $this->totalUserCount();

        # プロジェクトのコストを取得
        $gross_profit = $this->gross_profit;

        # 生産性の計算
        $productivity = $totalUserCount > 0 ? $gross_profit / $totalUserCount : 0;

        // 生産性の小数点以下を切り捨てて整数値を返す
        return round($productivity); // 小数点以下を1桁で四捨五入
    }
}
