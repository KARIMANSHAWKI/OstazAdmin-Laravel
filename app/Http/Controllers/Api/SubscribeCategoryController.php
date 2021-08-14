<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Models\Student;
use App\Repositories\Eloquent\Api\SubscribeCatStudent;
use App\Repositories\Eloquent\Api\SubscribeCatTrainer;




class SubscribeCategoryController extends Controller
{
    protected $subscribeCatTrainer, $subscribeCatStudent;

    public function __construct(SubscribeCatStudent $subscribeCatStudent,SubscribeCatTrainer $subscribeCatTrainer )
    {
        $this->subscribeCatStudent = $subscribeCatStudent;
        $this->subscribeCatTrainer = $subscribeCatTrainer;

    }

    public function subscribeCategory(Request $request){
        $authData = auth('sanctum')->user();
        $email = $authData->email;
        if(Trainer::where('email', $email)->first()){
                return  $this->subscribeCatTrainer->subscribe($request->categoriesIds, $authData->id );

        }else{
            return $this->subscribeCatStudent->subscribe($request->categoriesIds, $authData->id );
        }

    }
}
