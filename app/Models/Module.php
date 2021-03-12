<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'title', 'description', 'author', 'version'];
}
