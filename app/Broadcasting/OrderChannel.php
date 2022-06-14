<?php

namespace App\Broadcasting;

use App\Models\User;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OrderChannel implements ShouldBroadcast
{
    public $order;
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\Models\User  $user
     * @return array|bool
     */
    public function join(User $user)
    {
        //
    }

    public function broadcastOn()
    {
        return ['orders'];
    }
    public function broadcastAs()
    {
        return 'updated';
    }
}
