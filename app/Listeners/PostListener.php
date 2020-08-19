<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\casePositive;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class PostListener
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
    public function handle($event)
    {
        User::where ('role_id', '3')->each(function(User $user) use ($event){
            Notification::send($user, new casePositive($event->post));
            //Notification::send($users, new InvoicePaid($invoice));
        });
    }
}
