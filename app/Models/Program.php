<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Student;
use App\Models\Trainer;
use App\Models\Country;




class Program extends Model
{
    use HasFactory;

    protected $fillable = ['name','category_id','status'];
    protected $hidden = ['_token'];

    public function Students(){
        return $this->belongsToMany(Student::class, 'program_student');
    }

    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function Trainers(){
        return $this->belongsToMany(Trainer::class, 'program_trainer');
    }

    public function Countries(){
        return $this->belongsToMany(Country::class, 'program_country');
    }
}
