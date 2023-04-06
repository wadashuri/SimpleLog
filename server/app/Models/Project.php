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
}
