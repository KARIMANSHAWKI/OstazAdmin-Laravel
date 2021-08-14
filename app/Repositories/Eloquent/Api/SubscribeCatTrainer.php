<?php
namespace App\Repositories\Eloquent\Api;

use App\Repositories\Interfaces\Api\SubscribCategoryInterface;
use App\Models\Trainer;
use Hash;

class SubscribeCatTrainer implements SubscribCategoryInterface{

    public function subscribe(array $data, $id){
        $trainer = Trainer::where('id', $id)->first();
        $trainer->Categories()->attach($data);
        return response()->json([
            'status' => 200,
            'data' => 'categories added  successfully'
        ]);
}
}
