<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageEvent;
use App\Http\Requests\MessageResquest;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    
    public function all(string $channel= "L1"){
        return response()->json(
            Message::where("channel","=",$channel)->get()
        );
    }

    public function send(MessageResquest $request){
        ChatMessageEvent::dispatch($request->validated());
        return Response()->json(['message'=>"your message will be sent in a few moment!"],202);

    }
}

