<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Message;
use Auth;
use App\Events\Chat;
use Pusher\Pusher;


class MessageController extends Controller
{
    public function index(){
        $admins = Admin::where('id' , '!=', Auth::guard('admin')->user()->id)->get();
        return view('dashboard.chat.index')->with('admins', $admins);
    }

    public function getMessage($user_id){

        $admins = Admin::where('id' , '!=', Auth::guard('admin')->user()->id)->get();

        $my_id = Auth::guard('admin')->user()->id;
         // Get all messages from selected user
         $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get();

        return view('dashboard.chat.box')->with('messages', $messages)->with('admins', $admins);
    }

    public function sendMessage(Request $request){
        $from = Auth::guard('admin')->user()->id;
        $to = $request->receiver_id;
        $message = $request->message;
        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read =0;
        $data->save();
        // ##### Call Chat Event #####
        event(new Chat($from, $to, $message));
        return "Event has been sent!";

    }
}
