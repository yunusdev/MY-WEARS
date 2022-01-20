<?php

namespace App\Listeners;

use App\Mail\AdminOrderCompletedMail;
use App\Mail\UserOrderCompletedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class OrderCompletedListener
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
            $url = env('APP_URL');
            $to = [$adminEmail];
            Mail::to('yunusabdulqudus1@gmail.com')->send(new UserOrderCompletedMail($event->order, $url));
            $name = 'Admin';
            Mail::to($to)->send(new AdminOrderCompletedMail($event->order, $url));
        }catch (\Throwable $exception){
            info('ERROR SENDING EMAIL');
        }
    }
}
