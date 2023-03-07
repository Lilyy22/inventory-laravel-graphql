<?php

namespace App\Listeners;

// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;
use App\Events\VerifiedUser;
use App\Models\Auth\Role;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AssignRole
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(VerifiedUser $event)
    {
        try
        {
            $role = Role::where('slug', 'user')->firstOrFail();
            $event->user->roles()->save($role);
        }
        catch(ModelNotFoundException $e)
        {
            return 'something went wrong';
        }
    }
}
