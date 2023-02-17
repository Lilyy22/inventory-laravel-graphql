<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class EmailVerification extends Model
{
    use HasFactory;
     protected $fillable = [
        'email',
        'token',
        'expiry_date',
        'is_verified'
     ];

    public $incrementing = false;
    protected $keytype = 'string';
    protected $primaryKey = 'email';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'email',  'email');
    }
}
