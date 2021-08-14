<?php
namespace App\Repositories\Eloquent\Api;

use App\Repositories\Interfaces\Api\LoginApi;
use App\Models\Student;
use Hash;

class LoginStudent implements LoginApi{


    public function login(array $data){
        $student = Student::where('email', $data['email'])->first();

        if(!$student || !Hash::check($data['password'], $student->password)){
            return response()->json([
                'message' => 'Not Valid User'
            ],404);
        }

        $token = $student->createToken('my-app-token')->plainTextToken;
        $response = [
            'student' => $student,
            'token' => $token
        ];

        return response($response, 201);
    }
}
