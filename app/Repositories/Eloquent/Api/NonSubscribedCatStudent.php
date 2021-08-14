<?php
namespace App\Repositories\Eloquent\Api;

use App\Repositories\Interfaces\Api\INonSubscribedCategory;
use App\Models\Student;
use App\Models\Category;


class NonSubscribedCatStudent implements INonSubscribedCategory{


    public function nonSubscribedCategories(){
        $email = auth('sanctum')->user()->email;
        $student = Student::where('email', $email)->first();
        $st_country = $student->country;
        $categoryIds = array();
        $subscribedCategories =  $student->Categories;

        foreach ($subscribedCategories as $category){
            array_push($categoryIds, $category->pivot->category_id );
        }

        $nonSubscribedCategories = Category::whereNotIn('id', $categoryIds )->get();


        return response()->json([
            "status" => 200,
            'nonSubscribedCategories' =>$nonSubscribedCategories
        ]);





    }
}
