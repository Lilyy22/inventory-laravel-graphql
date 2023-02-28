<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
//use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\RolePermission;


class Role extends Model
{
    use HasFactory;
    use HasUuids;
    
    public $incrementing = false;
    protected $keytype = 'uuid';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'remark'
    ];

    public function users() : HasMany
    {
        return $this->hasMany(User::class, 'role_id');
    }

    public function permissions() : HasMany
    {
        return $this->hasMany(RolePermission::class, 'role_id');
    }
}
