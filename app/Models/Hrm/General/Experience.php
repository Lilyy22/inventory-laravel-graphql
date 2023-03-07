<?php

namespace App\Models\Hrm\General;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory, HasUuids;

    protected $keytype = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'company_name',
        'position',
        'start_date',
        'end_date',
        'employee_id'
    ];
}
