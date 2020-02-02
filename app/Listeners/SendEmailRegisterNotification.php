<?php

namespace App\Listeners;

use App\Events\Registered;
use App\Jobs\SendEmailsRegister;
use Log;

class SendEmailRegisterNotification
{
    public const LOG_CHANNEL = 'auth';

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //...
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle($event): void
    {
        SendEmailsRegister::dispatch($event->user);
        Log::alert('Register user: '.$event->user->name, self::LOG_CHANNEL);
    }
}
