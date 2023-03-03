<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Permission extends Model
{
    use HasFactory;
    use HasUuids;
    
    public $incrementing = false;
    protected $keytype = 'uuid';
    protected $primaryKey = 'id';

    public function roles() : HasMany
    {
        return $this->hasMany(RolePermission::class);
    }
}
