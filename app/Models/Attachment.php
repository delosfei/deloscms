<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'name', 'extension', 'user_id', 'size', 'site_id'];
}
