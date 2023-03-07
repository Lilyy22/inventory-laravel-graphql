<?php

namespace App\Models\Hrm\General;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory, HasUuids;

    protected $keytype = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'language',
        'read',
        'write',
        'speak',
        'listen',
        'employee_id'
    ];
}
