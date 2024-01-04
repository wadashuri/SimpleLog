<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $dates = [
        'start',
        'end',
        ];

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
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
        
        $query->where('start', '>=', $start)
              ->where('end', '<=', $end);
        
        return $query;
    }
    
    public function scopeExportTask($query, $request)
    {
        $date = $request->date ?? date('Y-m-d');
        $query->when(!empty($date), function ($q) use ($date) {
            $q->where('start', '<=', $date . ' 23:59:59')
                ->where('end', '>=', $date . ' 00:00:00');
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
