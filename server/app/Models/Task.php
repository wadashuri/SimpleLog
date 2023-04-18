<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
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

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * スコープ設定
     */
    public function scopeSearchTask($query, $request)
    {
        // 日付を取得する
        $date = $request->date ?? date("Y-m-d");

        // 日付が指定された場合は、開始日以上終了日未満のタスクを検索する
        $query->where(function ($query) use ($date) {
            $query->where('published_at', '<=', $date . ' 23:59:59')
                ->where('closed_at', '>=', $date . ' 00:00:00');
        });

        return $query;
    }
}
