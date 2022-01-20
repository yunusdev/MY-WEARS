<?php

namespace App\Listeners;

use App\Mail\AdminOrderInitiated;
use App\Mail\UserOrderConfirmationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use function Psy\debug;

class OrderInitiatedListener
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
     * @param  object $event
     * @return void
     */
    public function handle($event)
    {
        //
        try {
            $adminEmail = env('MAIL_ADMIN_EMAIL');
            $to = [$adminEmail];
            Mail::to($event->order->email)->send(new UserOrderConfirmationMail($event->order, $event->orderItems, $event->name, $event->is_auth, $event->url));
            $name = 'Admin';
            Mail::to($to)->send(new AdminOrderInitiated($event->order, $event->orderItems, $name, $event->url));
        }catch (\Throwable $exception){
            info('ERROR SENDING EMAIL');
        }

    }
}
