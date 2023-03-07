<?php 

namespace App\Repositories\Auth;

use Carbon\CarbonImmutable;
use App\Models\Auth\PasswordReset;

class PasswordResetRepository 
{
    // no of hours
    private $expirytime = 1; 

    public function create($email, $token)
    {
        return PasswordReset::updateOrCreate(
                    ['email' => $email],
                    ['token' => $token,
                     'expiry_date' => CarbonImmutable::now()->addHour($this->expirytime),
                    ]);
    }

    public function getEmail($token)
    {
        return PasswordReset::where('token', $token)->firstOrFail();
    }
}