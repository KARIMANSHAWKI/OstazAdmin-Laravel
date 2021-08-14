<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\Api\NonSubscribedCatStudent;
use App\Repositories\Eloquent\Api\NonSubscribedCatTrainer;

class NonSubscribedCatController extends Controller
{
    protected $nonSubscribedCatStudent, $nonSubscribedCatTrainer;
    public function __construct(NonSubscribedCatStudent $nonSubscribedCatStudent,NonSubscribedCatTrainer $nonSubscribedCatTrainer )
    {
        $this->nonSubscribedCatStudent = $nonSubscribedCatStudent;
        $this->nonSubscribedCatTrainer = $nonSubscribedCatTrainer;
    }

    public function getNonSubscribedCat()
    {
        $userType = userType();
        if ($userType == "student") {
            return $this->nonSubscribedCatStudent->nonSubscribedCategories();
        }else{
            return $this->nonSubscribedCatTrainer->nonSubscribedCategories();
        }
    }
}
