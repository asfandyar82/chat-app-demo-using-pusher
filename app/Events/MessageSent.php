<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chat;

   
    public function __construct($chat)
    {
        $this->chat = $chat;
    }

    public function broadcastOn()
    {
        return new Channel('my-channel');
        
        // new Channel('my-channel');
    }
    public function broadcastAs()
    {
        return 'my-event';
    }

    public function broadcastWith()
    {
        return [
            
            'username' => $this->chat['username'], 
            'message' => $this->chat['message'],
            'useridentifier' => $this->chat['useridentifier'],
            'createdat' => $this->chat['created_at']
        ];
    }
}
