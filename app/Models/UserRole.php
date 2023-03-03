<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Role;

class UserRole extends Model
{
    use HasFactory;
    use HasUuids;
    
    public $incrementing = false;
    protected $keytype = 'uuid';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'user_id',
        'role_id'
    ];

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function role(): BelongsTo 
    {
        return $this->belongsTo(Role::class);
    }
}
