<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\Api\SubscribedProStudent;
use App\Repositories\Eloquent\Api\SubscribedProTrainer;


class SubscribedProController extends Controller
{
    protected $subscribedProStudent, $subscribedProTrainer;
    public function __construct(SubscribedProStudent $subscribedProStudent,SubscribedProTrainer $subscribedProTrainer )
    {
        $this->subscribedProStudent = $subscribedProStudent;
        $this->subscribedProTrainer = $subscribedProTrainer;
    }

    public function getSubscribedPro()
    {
        $userType = userType();
        if ($userType == "student") {
            return $this->subscribedProStudent->subscribedPrograms();
        }else{
            return $this->subscribedProTrainer->subscribedPrograms();
        }
    }

}
