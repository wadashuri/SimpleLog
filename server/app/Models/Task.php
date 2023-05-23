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
        $query->when(!empty($request->date), function ($q) use ($request) {
            $q->where('start', '<=', $request->date . ' 23:59:59')
                ->where('end', '>=', $request->date . ' 00:00:00');
        });

        return $query;
    }


    /**
     * アクセサ設定
     */
    public function getPublishedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m-d');
    }

    public function getClosedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m-d');
    }
}
