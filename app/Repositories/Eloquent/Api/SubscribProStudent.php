<?php
namespace App\Repositories\Eloquent\Api;

use  App\Repositories\Interfaces\Api\SubscribeProgramInterface;
use App\Models\Student;
use Hash;

class SubscribProStudent implements SubscribeProgramInterface{

    public function subscribe(array $data, $id){
            $student = Student::where('id', $id)->first();
            $student->Programs()->attach($data);
            return response()->json([
                'status' => 200,
                'data' => 'programs added  successfully'
            ]);
    }
}
