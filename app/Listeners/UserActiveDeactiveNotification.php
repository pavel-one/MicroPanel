<?php

namespace App\Listeners;

use App\Events\UserActiveDeactive;
use App\Mail\UserActive;
use App\Mail\UserDeactive;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserActiveDeactiveNotification implements ShouldQueue
{
//    public $queue = 'listeners';

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
     * @param UserActiveDeactive $event
     * @return bool
     */
    public function handle(UserActiveDeactive $event)
    {
        if (!$event->user instanceof User) {
            return false;
        }

        $user = $event->user;

        if ($event->active) {
            \Mail::to($user)->send(new UserActive($user));
        } else {
            \Mail::to($user)->send(new UserDeactive($user));
        }
    }
}
