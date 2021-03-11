<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'site_num', 'days'];

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'group_packages');
    }
}
