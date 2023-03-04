<?php

namespace App\Models\Auth;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
//use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Auth\Role;
use App\Models\EmailVerification;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
//use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasUuids;
    //use SoftDeletes;

    public $incrementing = false;
    protected $keytype = 'uuid';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // protected $attributes = [
    //     'role' => 'user',
    // ];

    public function roles(): BelongsToMany 
    {
        return $this->belongsToMany(Role::class);
    }

    public function email_verification(): HasOne
    {
        return $this->hasOne(EmailVerification::class, 'email', 'email');
    }

    public function is_active()
    {
        return $this->email_verified_at != null ? true : false; 
    }

    
}
