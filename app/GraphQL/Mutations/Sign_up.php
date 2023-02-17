<?php

namespace App\GraphQL\Mutations;
use App\Models\User as users;
use Illuminate\Support\Facades\Hash;
use App\Events\SendMail;
use App\Traits\GenerateToken;

final class Sign_up
{
    use GenerateToken;
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = users::create([
            'name' => $args['name'],
            'email' => $args['email'],
            'role' => 'user',
            'password' => Hash::make($args['password']),
        ]);
        
        $token = $this->get_token();
        SendMail::dispatch($user, $token);
        $this->store_token($user, $token);

        return ['message'=> 'We have send email with verification code.'];
    }
}
