<?php
namespace App\Repositories\Eloquent\Api;

use App\Repositories\Interfaces\Api\ISubscribedCategory;
use App\Models\Student;
use App\Models\Category;


class SubscribedCatStudent implements ISubscribedCategory{

    public function subscribedCategories(){
        $email = auth('sanctum')->user()->email;
        $student = Student::where('email', $email)->first();
        $categoryIds = array();
        $subscribedCategories =  $student->Categories;
        foreach ($subscribedCategories as $category){
            array_push($categoryIds, $category->pivot->category_id );
        }

        $categories = Category::whereIn('id', $categoryIds )->get();


        return response()->json([
            "status" => 200,
            'subscribedCategories' =>$categories
        ]);





    }
}
