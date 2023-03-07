<?php

namespace App\Listeners;

// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;
use App\Events\RegisteredUser;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerficationMailable;
use Exception;

class SendEmailVerification
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
    public function handle(RegisteredUser $event)
    {
        try
        {
            Mail::to($event->user->email)->send(new VerficationMailable($event->user, $event->token));
        }
        catch(Exception $e)
        {
            return 'something went wrong';
        }
    }
}
