<?php

namespace App\Models\Hrm\Leave;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveRequest extends Model
{
    use HasFactory, HasUuids;

    protected $keytype = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'leave_type_id',
        'remark',
        'is_approved',
        'approver_id',
        'start_date',
        'end_date',
        'employee_id'
    ];
}
