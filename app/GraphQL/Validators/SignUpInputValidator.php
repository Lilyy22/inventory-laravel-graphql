<?php

namespace App\GraphQL\Validators;

use Nuwave\Lighthouse\Validation\Validator;

final class SignUpInputValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            'name'=> [
                'required', 'unique:users,name', 'min:4', 'max:22'
            ],
            'email'=> [
                'required', 'email', 'unique:users,email'
            ],
            'password'=> [
                'required', 'min:8', 'max:32', 
                'regex:/^.*(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!$-_@%]).*$/'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'The username is already in use.',
            'email.unique' => 'The email already in use.',
            'password.format' => 'password must contain at least one uppercase one lowercase one number and one special character(!$-_@%).',
        ];
    }
}
