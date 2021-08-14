<?php

namespace App\Services;

use Kutia\Larafirebase\Facades\Larafirebase;


class NotificationService{

    // private $deviceTokens =['{TOKEN_1}', '{TOKEN_2}'];

    public static  function sendNotification($device_token, $message)
    {
        return Larafirebase::withBody($message)
            ->withClickAction('admin/notifications')
            ->withPriority('high')
            ->sendNotification($device_token);
    }

    public function sendMessage()
    {
        return Larafirebase::withTitle('Test Title')
            ->withBody('Test body')
            ->sendMessage($this->deviceTokens);
    }

}
