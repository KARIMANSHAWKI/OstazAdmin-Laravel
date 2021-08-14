<?php
namespace App\Repositories\Eloquent\Api;

use App\Repositories\Interfaces\Api\LoginApi;
use App\Models\Trainer;
use Hash;

class LoginTrainer implements LoginApi{


    public function login(array $data){
        $trainer = Trainer::where('email', $data['email'])->first();

        if(!$trainer || !Hash::check($data['password'], $trainer->password)){
            return response()->json([
                'message' => 'Not Valid User'
            ],404);
        }


        $token = $trainer->createToken('my-app-token')->plainTextToken;
        $cookie = cookie('jwt', $token, 60 * 24); // 1 day

        $response = [
            'trainer' => $trainer,
            'token' => $token
        ];

        return response($response, 201)->withCookie($cookie);
    }
}
