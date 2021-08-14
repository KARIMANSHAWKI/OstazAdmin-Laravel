<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\HomeRepositoryInterface;
use App\Models\Category;
use App\Models\Program;
use App\Models\Student;


use Illuminate\Database\Eloquent\Model;



class HomeRepository extends BaseRepository implements HomeRepositoryInterface
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getCategoryTrainers(){

        $trainers= array();
        $categories = Category::all();
        foreach($categories as $category){
            $count = $category->Trainers->count();
            $trainers[$count] = $category->name ;
        }
        $trainersCount = $category->trainers->count();
        return $trainers;
    }

    public function getProgramsCount(){

        $programs = Program::all();

        $programsCount = $programs->count();
        return $programsCount;
    }


    public function getStudentCount(){

        $students = Student::all();

        $studentsCount = $students->count();
        return $studentsCount;
    }
}
