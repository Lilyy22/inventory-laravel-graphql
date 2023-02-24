<?php 

namespace App\Repositories\Auth;

use App\Models\EmailVerification;
use Carbon\CarbonImmutable;

class EmailVerificationRepository 
{

    // private $emailVerification;

    // public function __construct(EmailVerification $emailVerification)
    // {
    //     $this->emailVerification = $emailVerification;
    // }

    public function create(array $user, $token)
    {
        return EmailVerification::Create([
            'email' => $user['email'],
            'token' => $token,
            'expiry_date' => CarbonImmutable::now()->add(1, 'day'),
            'is_verified' => false,
        ]);
    }

    public function updateToken($user, $token)
    {
        return EmailVerification::where('email', $user['email'])
                ->update([
                    'token' => $token,
                    'expiry_date' => CarbonImmutable::now()->add(1, 'day'),
                ]);
    }

    public function verify($token)
    {
        return EmailVerification::where('token', $token)
                ->update([
                    'is_verified' => true,
                ]);
    }

    public function getEmail($token)
    {
        return EmailVerification::where('token', $token)->firstOrFail();
    }

    public function getUnverifiedToken($email)
    {
        return EmailVerification::where('email', $email)
                ->where('is_verified', false)
                ->firstOrFail();
    }
}