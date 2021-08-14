<?php
namespace App\Repositories\Eloquent\Api;

use  App\Repositories\Interfaces\Api\SubscribCategoryInterface;
use App\Models\Student;
use Hash;

class SubscribeCatStudent implements SubscribCategoryInterface{

    public function subscribe(array $data, $id){
            $student = Student::where('id', $id)->first();
            $student->Categories()->attach($data);
            return response()->json([
                'status' => 200,
                'data' => 'categories added  successfully'
            ]);
    }
}
