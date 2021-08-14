<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trainer;
use App\Models\Student;
use App\Models\Program;

class Category extends Model
{
    use HasFactory;

    public function Trainers(){
        return $this->belongsToMany(Trainer::class, 'category_trainer');
    }

    public function Students(){
        return $this->belongsToMany(Student::class, 'category_student');
    }

    public function Programs(){
        return $this->hasMany(Program::class);
    }
}
