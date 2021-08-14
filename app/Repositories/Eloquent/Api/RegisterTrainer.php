<?php
namespace App\Repositories\Eloquent\Api;

use App\Repositories\Interfaces\Api\RegisterApi;
use App\Models\Trainer;
use Hash;

class RegisterTrainer implements RegisterApi{

    public function register(array $data){
        $trainer = Trainer::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'age' => $data['age'],
            'gender' => $data['gender'],
            'country_id' => $data['country_id'],
            'password' => Hash::make($data['password'])
        ]);

        return response()->json([
            'status' => 200,
            'data' => $trainer
        ]);
    }
}
