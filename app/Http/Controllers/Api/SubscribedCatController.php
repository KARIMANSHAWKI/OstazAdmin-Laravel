<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\Api\SubscribedCatStudent;
use App\Repositories\Eloquent\Api\SubscribedCatTrainer;

class SubscribedCatController extends Controller
{

    protected $subscribedCatStudent, $subscribedCatTrainer;
    public function __construct(SubscribedCatStudent $subscribedCatStudent,SubscribedCatTrainer $subscribedCatTrainer )
    {
        $this->subscribedCatStudent = $subscribedCatStudent;
        $this->subscribedCatTrainer = $subscribedCatTrainer;
    }

    public function getSubscribedCat()
    {
        $userType = userType();
        if ($userType == "student") {
            return $this->subscribedCatStudent->subscribedCategories();
        }else{
            return $this->subscribedCatTrainer->subscribedCategories();
        }
    }

}
