<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserOrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $is_auth, $order, $orderItems, $url;

    /**
     * Create a new event instance.
     *
     * @param Order $order
     * @param $name
     * @param $is_auth
     * @param $url
     */
    public function __construct(Order $order, $orderItems, $name, $is_auth, $url)
    {
        //
        $this->order = $order;
        $this->orderItems = $orderItems;
        $this->is_auth = $is_auth;
        $this->name = $name;
        $this->url = $url;

    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject("Order Confirmation")->view('mail.user.order-confirm');
    }
}
