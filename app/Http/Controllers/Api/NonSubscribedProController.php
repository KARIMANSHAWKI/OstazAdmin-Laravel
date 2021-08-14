<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\Api\NonSubscribedProStudent;
use App\Repositories\Eloquent\Api\NonSubscribedProTrainer;


class NonSubscribedProController extends Controller
{
    protected $nonSubscribedProStudent, $nonSubscribedProTrainer;
    public function __construct(NonSubscribedProStudent $nonSubscribedProStudent,NonSubscribedProTrainer $nonSubscribedProTrainer )
    {
        $this->nonSubscribedProStudent = $nonSubscribedProStudent;
        $this->nonSubscribedProTrainer = $nonSubscribedProTrainer;

    }

    public function getNonSubscribedPro()
    {
        $userType = userType();
        if ($userType == "student") {
            return $this->nonSubscribedProStudent->nonSubscribedPrograms();
        }else{
            return $this->nonSubscribedProTrainer->nonSubscribedPrograms();
        }
    }
}
