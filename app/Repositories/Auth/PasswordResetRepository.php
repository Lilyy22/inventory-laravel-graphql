<?php 

namespace App\Repositories\Auth;

use App\Models\EmailVerification;
use Carbon\CarbonImmutable;
use App\Models\PasswordReset;

class PasswordResetRepository 
{

    public function create($email, $token)
    {
        return PasswordReset::updateOrCreate(
                    ['email' => $email],
                    ['token' => $token,
                     'expiry_date' => CarbonImmutable::now()->addHour(1),
                    ]);
    }

    public function verify($token)
    {
        return PasswordReset::where('token', $token)
                    ->update([
                        'is_verified' => true,
                    ]);
    }

    public function getEmail($token)
    {
        return PasswordReset::where('token', $token)->firstOrFail();
    }

    public function getUnverifiedToken($email)
    {
        return PasswordReset::where('email', $email)
                ->where('is_verified', false)
                ->firstOrFail();
    }
}