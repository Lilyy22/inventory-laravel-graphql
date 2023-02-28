<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Permission;
use App\Models\Role;

class RolePermission extends Model
{
    use HasFactory;
    use HasUuids;
    
    public $incrementing = false;
    protected $keytype = 'uuid';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'role_id',
        'permission_id'
    ];

    public function role() : BelongsTo 
    {
        return $this->belongsTo(Role::class);
    }

    public function permission() : BelongsTo 
    {
        return $this->belongsTo(Permission::class);
    }
}
