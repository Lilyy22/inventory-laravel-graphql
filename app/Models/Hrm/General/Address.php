<?php

namespace App\Models\Hrm\General;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory, HasUuids;

    protected $keytype = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'country',
        'region',
        'zone',
        'woreda',
        'house_no',
        'employee_id'
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
}
