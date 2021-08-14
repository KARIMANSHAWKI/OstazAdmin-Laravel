<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use Laravel\Sanctum\HasApiTokens;



class Student extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['first_name', 'last_name', 'email', 'age', 'phone', 'country_id', 'status', 'gender'];
    protected $hidden = ['password'];

    public function Programs(){
        return $this->belongsToMany(Program::class, 'program_student');
    }

    public function Categories(){
        return $this->belongsToMany(Category::class, 'category_student');
    }

    function country()
    {
       return $this->belongsTo(Country::class);
    }

    public function getFirstNameAttribute($val){
        return ucfirst($val);
    }

    public function getLastNameAttribute($val){
        return ucfirst($val);
    }

}
