<?php

namespace App\Providers;

use Illuminate\Auth\Events\RegisteredUser;
use Illuminate\Auth\Events\VerifiedUser;
use Illuminate\Auth\Listeners\SendEmailVerification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        RegisteredUser::class => [
            SendEmailVerification::class,
        ],
        VerifiedUser::class => [
            AssignRole::class,
        ]
        
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }
}
