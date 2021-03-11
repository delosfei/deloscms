<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Auth;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['title'];
    protected $appends = ['permissions'];

    public function getPermissionsAttribute()
    {

        return ['delete' => Auth::check() && Auth::user()->can('delete', $this)];
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_packages');
    }
}
