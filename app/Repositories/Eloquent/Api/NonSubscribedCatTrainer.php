<?php
namespace App\Repositories\Eloquent\Api;

use App\Repositories\Interfaces\Api\INonSubscribedCategory;
use App\Models\Trainer;
use App\Models\Category;


class NonSubscribedCatTrainer implements INonSubscribedCategory{


    public function nonSubscribedCategories(){
        $email = auth('sanctum')->user()->email;
        $trainer = Trainer::where('email', $email)->first();
        $categoryIds = array();
        $subscribedCategories =  $trainer->Categories;
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
