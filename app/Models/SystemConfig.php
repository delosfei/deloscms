<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static updateOrcreate(int[] $array, array $array1)
 */
class SystemConfig extends Model
{
    use HasFactory;

    protected $fillable = ['config'];
    protected $casts = ['config' => 'array'];
}
