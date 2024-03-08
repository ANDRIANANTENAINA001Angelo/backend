<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilterUserController extends Controller
{
    public function niveauFilter(){
        $niveau= Auth::user()->niveau;
        return response()->json(["data"=> User::where("niveau","=",$niveau)->get() ]);
    }


    public function MessageFilter(){
        $niveau= Auth::user()->niveau;
        return response()->json(["data"=> Message::where("channel","=","chat.".$niveau)->get() ]);
    }

    public function MessageEni(){
        return response()->json(["data"=> Message::where("channel","=","chat.eni")->get() ]);
    }
}
