<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RefreshToken extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keytype = "string";
    protected $primaryKey = "token";

    protected $fillable = [
        'token',
        'expires_at',
        'user_id'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function is_expired()
    {
       ($this->expires_at < time()) ? false : true;
    }

}
