<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\Api\RegisterStudent;
use App\Repositories\Eloquent\Api\RegisterTrainer;


class RegisterApiController extends Controller
{
    protected $registerStudent, $registerTrainer;

    public function __construct(RegisterTrainer $registerTrainer,RegisterStudent $registerStudent )
    {
        $this->registerStudent = $registerStudent;
        $this->registerTrainer = $registerTrainer;

    }

    public function register (Request $request){
         $data = $request->all();
         if($request->isStudent == true){
             $data =  $this->registerStudent->register($data);
             return response()->json([
                'status' => 200,
                'student_data' => $data
            ]);
         }elseif($request->isTrainer== true){
             $data = $this->registerTrainer->register($data);
             return response()->json([
                'status' => 200,
                'trainer_data' => $data
            ]);
         }else{
            return response()->json([
                'status' => 405,
                'trainer_data' => 'please specify user is student or trainer'
            ]);
         }


    }
}
