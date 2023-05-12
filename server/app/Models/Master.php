<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Master extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];

    // ========================================================================

    /**
     * ミューテタ設定
     */
    public function setPasswordAttribute($attr)
    {
        $this->attributes['password'] =  Hash::make($attr);
    }

    // ========================================================================

    /**
     * リレーション設定
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
