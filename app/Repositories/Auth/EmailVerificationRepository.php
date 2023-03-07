<?php 

namespace App\Repositories\Auth;

use App\Models\Auth\EmailVerification;
use Carbon\CarbonImmutable;

class EmailVerificationRepository 
{

    private $expirytime = 1; 

    public function updateOrCreate($user, $token)
    {
        return EmailVerification::updateOrCreate(
            ['email' => $user['email']],
            [
                'token' => $token,
                'expiry_date' => CarbonImmutable::now()->addHour($this->expirytime)
             ]);
    }

    public function getEmail($token)
    {
        return EmailVerification::where('token', $token)->firstOrFail();
    }
}