<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
//use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Auth\Role;
use App\Models\Auth\Permission;
use App\Models\EmailVerification;
use App\Trait\HasAuthorization;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, 
        Notifiable, HasUuids, 
        HasAuthorization;
    //use SoftDeletes;

    public $incrementing = false;
    protected $keytype = 'uuid';

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function email_verification(): HasOne
    {
        return $this->hasOne(EmailVerification::class, 'email', 'email');
    }

    public function is_active()
    {
        return $this->email_verified_at != null ? true : false; 
    }
    
    public function hasPermission($permission)
    {
       return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }

    public function hasRole($role)
    {
       return (bool) $this->roles->where('slug', $role->slug)->count();
    }

     public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function roleNames()
    {
        return $this->roles->map(function($item){
             return $item->slug;
        });
    }
}
