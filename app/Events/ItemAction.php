<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Package;
use App\Models\Simcard;
use App\Models\ConnectedCar;

class ItemAction
{
    private $item;
    private $action;

    use InteractsWithSockets, SerializesModels;

    public function getItem()
    {
        return $this->item;
    }


    public function getAction()
    {
        return $this->action;
    }

    /**
     * Create a new event instance.
     * LeadAction constructor.
     * @param Lead $lead
     * @param $action
     */
    public function __construct($item, $action)
    {
        $this->item = $item;
        $this->action = $action;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
