<?php

namespace App\Providers;

use App\Events\Registered;
use App\Events\UserActiveDeactive;
use App\Listeners\SendEmailRegisterNotification;
use App\Listeners\UserActiveDeactiveNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailRegisterNotification::class
        ],
        UserActiveDeactive::class => [
            UserActiveDeactiveNotification::class
        ],
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            // add your listeners (aka providers) here
            'SocialiteProviders\\VKontakte\\VKontakteExtendSocialite@handle',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
