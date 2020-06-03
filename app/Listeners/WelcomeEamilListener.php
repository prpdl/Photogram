<?php

namespace App\Listeners;

use App\Events\NewCustomerEmailEvent;
use App\Mail\WelcomeNewUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;


class WelcomeEamilListener implements ShouldQueue
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
     * @param  NewCustomerEmailEvent  $event
     * @return bool
     */
    public function handle(NewCustomerEmailEvent $event)
    {

        if(strtoupper($event->user->name) === 'GENERIC'){
            return false;
        }

        Mail::to($event->user->email)->send(new WelcomeNewUser($event->user));
    }
}
