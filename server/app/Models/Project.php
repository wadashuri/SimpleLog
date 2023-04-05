<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
    public function scopesearchProject($query, $request)
    {
        # インスタンス生成
        $end_time = new Carbon($request->end);

        $query
            ->with(['admin'])
            ->when($request->filled('admin_id'), function ($q) use ($request) {
                $q->where('admin_id', $request->admin_id);
            })
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
                $q->where(function ($q) use ($request) {
                    $q->whereHas('user', function ($q) use ($request) {
                        $q->where('name', 'LIKE', '%' . $request->search . '%');
                    })
                        ->orWhere('customer_manager', 'LIKE', '%' . $request->search . '%');
                });
            });
    }
}
