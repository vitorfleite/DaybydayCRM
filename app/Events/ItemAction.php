<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Package;

class ItemAction
{
    private $package;
    private $action;

    use InteractsWithSockets, SerializesModels;

    public function getPackage()
    {
        return $this->package;
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
    public function __construct(Package $package, $action)
    {
        $this->package = $package;
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
