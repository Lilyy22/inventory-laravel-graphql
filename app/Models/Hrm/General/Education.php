<?php

namespace App\Models\Hrm\General;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Hrm\General\Employee;

class Education extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keytype = 'uuid';

    protected $fillable = [
        'institution',
        'city',
        'major',
        'level',
        'gpa',
        'start_date',
        'end_date',
        'employee_id'
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
