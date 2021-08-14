<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\NotificationService;
class SettingController extends Controller
{

    public function notifications(){
        return view('dashboard.settings.notifications');
    }

    public function send(Request $request)
    {
        return NotificationService::sendNotification(array($request->device_token), $request->message);
    }
}
