<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Auth\User;
use Carbon\Carbon;

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

    public function is_expired()
    {
        return Carbon::now()
                    ->greaterThan($this->expiry_date) ? 
                    true : false;
    }
}
