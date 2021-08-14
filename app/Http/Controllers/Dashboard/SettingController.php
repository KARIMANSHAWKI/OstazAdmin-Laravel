<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Notification;

class SettingController extends Controller
{
    public function notifications(){
        return view('dashboard.settings.notifications');
    }

    public function send(Request $request)
    {
        return Notification::sendNotification(array($request->device_token), array(
          "title" => "Sample Message",
          "body" => "This is Test message body"
        ));
    }
}
