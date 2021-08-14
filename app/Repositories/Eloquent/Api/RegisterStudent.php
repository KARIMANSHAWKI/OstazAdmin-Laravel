<?php
namespace App\Repositories\Eloquent\Api;

use App\Repositories\Interfaces\Api\RegisterApi;
use App\Models\Student;
use Hash;

class RegisterStudent implements RegisterApi{


    public function register(array $data){
        $student = new Student();
        $student->first_name = $data['first_name'];
        $student->last_name = $data['last_name'];
        $student->email = $data['email'];
        $student->phone = $data['phone'];
        $student->age = $data['age'];
        $student->gender = $data['gender'];
        $student->country_id = $data['country_id'];
        $student->password =  Hash::make($data['password']);
        $student->save();



        return response()->json([
            'status' => 200,
            'data' => $student
        ]);
    }
}
