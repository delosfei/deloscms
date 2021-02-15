<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'domain', 'config', 'keyword', 'description', 'logo', 'icp', 'tel', 'email', 'counter'];
}
