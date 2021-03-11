<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupPackage extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'package_id'];
}
