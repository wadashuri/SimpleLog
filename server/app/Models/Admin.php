<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Subscription;

class Admin extends Authenticatable
{
    use HasFactory, Billable;

    protected $guarded = ['id'];


    // ========================================================================

    /**
     * リレーション設定
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    // ========================================================================

    /**
     * ミューテタ設定
     */
    public function setPasswordAttribute($attr)
    {
        $this->attributes['password'] =  Hash::make($attr);
    }
}
