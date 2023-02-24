<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use HasUuids, SoftDeletes;
    
    public $incrementing = false;
    protected $keytype = 'uuid';
    protected $primaryKey = 'name';
    
    protected $fillable = [
        'name',
        'remark'
    ];

    public function users() : HasMany
    {
        return $this->hasMany(User::class, 'role', 'name');
    }
}
