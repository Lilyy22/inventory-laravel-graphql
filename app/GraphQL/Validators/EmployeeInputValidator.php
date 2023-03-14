<?php

namespace App\GraphQL\Validators;

use Nuwave\Lighthouse\Validation\Validator;

final class EmployeeInputValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            'first_name'=> [
                'required', 
            ],
            'last_name'=> [
                'required', 
            ],
            'grand_father_name'=> [
                'required', 
            ],
            'birth_date'=> [
                'required', 'date'
            ],
            'birth_place'=> [
                'required', 
            ],
            'religion'=> [
                'required', 
            ],
            'gender'=> [
                'required', 
            ],
            'nationality'=> [
                'required', 
            ],
            'marital_status'=> [
                'required', 
            ],
            'department_id'=> [
                'required', 
            ],
            'user_id'=> [
                'required', 
            ],
        ];
    }
}
