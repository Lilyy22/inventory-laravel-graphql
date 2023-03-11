<?php

namespace App\GraphQL\Validators;

use Nuwave\Lighthouse\Validation\Validator;

final class SignInInputValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            'email'=> [
                'required', 'email', 
            ],
            'password'=> [
                'required', 'min:8', 'max:32', 
                'regex:/^.*(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!$-_@%]).*$/'
            ],
        ];
    }
}
