<?php

namespace App\Models\Hrm\General;

// use App\Traits\HasDepartments;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Department extends Model
{
    use HasFactory, HasUuids;

    protected $keytype = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'remark',
        'phone_no',
        'company_id',
        'parent_id'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    // public function employee(): BelongsTo
    // {
    //     return $this->belongsTo(Employee::class, 'manager_employee_id');
    // }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(static::class, $this->parentColumn);
    }
}
