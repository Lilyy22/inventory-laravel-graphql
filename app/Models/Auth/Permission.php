<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Auth\Role;
use App\Models\Auth\User;

class Permission extends Model
{
    use HasFactory, HasUuids;
    
    public $incrementing = false;
    protected $keytype = 'uuid';

    // protected $fillable = [
    //     'id',
    //     'name',
    //     'slug'
    // ];

    public function roles() : BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
