<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'real_name',
        'password',
        'home',
        'avatar',
        'wechat',
        'qq',
        'group_id',
        'email_verified_at',
        'mobile_verified_at',
        'favour_count',
        'favorite_count',
        'remember_token',
        'lock',
        'ren',
        'yi',
        'li',
        'zhi',
        'xin',
        'is_super_admin',
        'current_team_id',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'mobile_verified_at' => 'datetime',
    ];

    protected $appends = [
        'icon',
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
     * @return HasMany
     */
    public function sites()
    {
        return $this->hasMany(Site::class);
    }

//    public function group()
//    {
//
//    }


}
