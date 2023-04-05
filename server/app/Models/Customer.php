<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
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

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
