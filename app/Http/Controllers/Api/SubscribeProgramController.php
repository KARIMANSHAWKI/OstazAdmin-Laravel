<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Models\Student;
use App\Repositories\Eloquent\Api\SubscribProStudent;
use App\Repositories\Eloquent\Api\SubscribeProTrainer;

class SubscribeProgramController extends Controller
{
    protected $subscribeProTrainer;
    protected $subscribeProStudent;

    public function __construct(SubscribProStudent $subscribeProStudent, SubscribeProTrainer $subscribeProTrainer)
    {
        $this->subscribeProStudent = $subscribeProStudent;
        $this->subscribeProTrainer = $subscribeProTrainer;
    }

    public function subscribeProgram(Request $request)
    {
        $authData = auth('sanctum')->user();
        $email = $authData->email;
        if (Trainer::where('email', $email)->first()) {
            return  $this->subscribeProTrainer->subscribe($request->programsIdas, $authData->id);
        } else {
            return $this->subscribeProStudent->subscribe($request->programsIdas, $authData->id);
        }
    }
}
