<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'mobile'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'icon'
    ];

    /**
     * 超级管理员
     * @return void
     */
    public function getIsSuperAdminAttribute()
    {
        return $this->id == 1;
    }

    /**
     * 用户头像
     *
     * @return void
     */
    public function getIconAttribute()
    {
        return $this['avatar'] ?? url('/images/user.jpeg');
    }

    /**
     * 用户创建的所有站点
     *
     * @return void
     */
    public function sites()
    {
        return $this->hasMany(Site::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
