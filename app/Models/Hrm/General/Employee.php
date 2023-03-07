<?php

namespace App\Models\Hrm\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Model\Auth\User;
use App\Model\Hrm\General\Department;
use App\Model\Hrm\General\Contact;
use App\Model\Hrm\General\Education;
use App\Model\Hrm\General\Family;
use App\Models\Hrm\General\Language;
use App\Models\Hrm\General\EmergencyContact;
use App\Model\Hrm\General\Experience;
use App\Models\Hrm\General\Reference;
use App\Models\Hrm\General\Address;
use App\Models\Hrm\General\Disability;

class Employee extends Model
{
    use HasFactory, HasUuids;

    protected $keytype = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'grand_father_name',
        'birth_date',
        'birth_place',
        'religion',
        'gender',
        'nationality',
        'marital_status',
        'additional_skill',
        'department_id',
        'user_id',
        'is_approved'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function addresss(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function educations(): HasMany
    {
        return $this->hasMany(Education::class);
    }

    public function families(): HasMany
    {
        return $this->hasMany(Family::class);
    }

    public function references(): HasMany
    {
        return $this->hasMany(Reference::class);
    }

    public function languages(): HasMany
    {
        return $this->hasMany(Language::class);
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }

    public function disabilities(): HasMany
    {
        return $this->hasMany(Disability::class);
    }

    public function emergencyContacts(): HasMany
    {
        return $this->hasMany(EmergencyContact::class);
    }

}
