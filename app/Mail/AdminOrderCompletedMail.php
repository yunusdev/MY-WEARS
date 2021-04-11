<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminOrderCompletedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order, $url;

    /**
     * Create a new event instance.
     *
     * @param Order $order
     * @param $url
     */
    public function __construct(Order $order, $url)
    {
        //
        $this->order = $order;
        $this->url = $url;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Order Completed")->view('mail.admin.order-completed');
    }
}
