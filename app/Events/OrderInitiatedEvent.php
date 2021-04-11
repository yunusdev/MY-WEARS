<?php

namespace App\Events;

use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderInitiatedEvent
{
    use SerializesModels;

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
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [];
    }
}
