<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // ========================================================================

    /**
     * リレーション設定
     */
    public function master()
    {
        return $this->belongsTo(Master::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
