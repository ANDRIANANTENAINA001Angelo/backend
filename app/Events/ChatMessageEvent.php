<?php

namespace App\Events;

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
    public function __construct(private array $data)
    {
        $this->user_id = Auth::user()->id;
        $this->message = $data["content"];
        $this->channel = "channel.".$data["channel"];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new PrivateChannel($this->channel);
    }

    public function broadcastAs():string{
        return $this->channel;
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->message,
            'sender' => $this->user_id,
            "channel"=> $this->channel,
            "creat_at" => now(),
        ];
    }



}
