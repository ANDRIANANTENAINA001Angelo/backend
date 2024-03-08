<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $channel;
    public string $message;
    public int $user_id;
    /**
     * Create a new event instance.
     */
    public function __construct(private array $data,string $channel="")
    {
        $this->user_id = Auth::user()->id;
        $this->message = $data["content"];
        if($channel==""){
            $this->channel = "chat.".Auth::user()->niveau;
        }
        else{
            $this->channel = "chat.eni";
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new Channel($this->channel);
    }

    public function broadcastAs():string{
        return $this->channel;
    }

    public function broadcastWith()
    {
        $message = Message::create(
            [
                "content"=> $this->message,
                "sender"=> $this->user_id,
                "channel"=> $this->channel
            ]
        );

        return [
            "message is saved",
            $message
        ];
    }



}
