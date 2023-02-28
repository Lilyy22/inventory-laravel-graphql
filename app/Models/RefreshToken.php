<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefreshToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'expires_at',
        'user_id'
    ];

    public $incrementing = false;
    protected $keytype = 'string';
}
