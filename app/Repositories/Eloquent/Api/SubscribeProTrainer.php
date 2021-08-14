<?php
namespace App\Repositories\Eloquent\Api;

use App\Repositories\Interfaces\Api\SubscribeProgramInterface;
use App\Models\Trainer;
use Hash;

class SubscribeProTrainer implements SubscribeProgramInterface{

    public function subscribe(array $data, $id){
        $trainer = Trainer::where('id', $id)->first();
        $trainer->Programs()->attach($data);
        return response()->json([
            'status' => 200,
            'data' => 'programs added  successfully'
        ]);
}
}
