<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Auth;

/**
 * @property int|mixed|string|null user_id
 * @property array|mixed config
 * @method static where(string $string, string $string1, string $string2)
 */
class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'domain',
        'config',
        'user_id',
        'keyword',
        'description',
        'logo',
        'icp',
        'tel',
        'email',
        'counter',
    ];

    protected $casts = [
        'config' => 'array',
    ];

    public function getPermissionAttribute(): array
    {
        if (Auth::check()) {
            return [
                'edit' => Auth::user()->can('update', $this),
            ];
        }
    }

    public function master()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
