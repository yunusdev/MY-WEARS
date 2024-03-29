<?php

namespace App\Providers;

use App\Events\OrderCompletedEvent;
use App\Events\OrderInitiatedEvent;
use App\Listeners\OrderCompletedListener;
use App\Listeners\OrderInitiatedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
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
            SendEmailVerificationNotification::class,
        ],

        OrderInitiatedEvent::class => [
            OrderInitiatedListener::class,
        ],

        OrderCompletedEvent::class => [
            OrderCompletedListener::class,
        ],
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
}
