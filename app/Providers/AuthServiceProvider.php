<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Services\Auth\JwtToken;
// use App\Models\Auth\Role;
// use App\Policies\Auth\RolePolicy;
// use App\Models\Auth\User;
// use App\Policies\Auth\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::viaRequest('jwt', function (Request $request) {
            if(empty($request->bearerToken()))
            {
                return  null;
            }
                return JwtToken::getUser($request->bearerToken(), config('services.jwt.access_token_key'));
            
        });
        
    }
}
