<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\Api\LoginStudent;
use App\Repositories\Eloquent\Api\LoginTrainer;


class LoginApiController extends Controller
{
    protected $loginStudent, $loginTrainer;

    public function __construct(LoginTrainer $loginTrainer,LoginStudent $loginStudent )
    {
        $this->loginStudent = $loginStudent;
        $this->loginTrainer = $loginTrainer;
    }

    public function login (Request $request){
         $data = $request->all();
         if($request->isStudent == true){
             $data = $this->loginStudent->login($data);
             return response()->json([
                'status' => 200,
                'student_data' => $data
            ]);
         }elseif($request->isTrainer== true){
             $data =  $this->loginTrainer->login($data);
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
