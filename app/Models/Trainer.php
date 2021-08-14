<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Program;
use App\Models\Category;
use App\Models\Country;
use Laravel\Sanctum\HasApiTokens;




class Trainer extends Model
{
    use HasFactory, HasApiTokens;

    const ACTIVE = 0;
    const NOTACTIVE = 1;
    protected $fillable = ['first_name', 'last_name', 'email', 'age', 'phone', 'country_id', 'status', 'gender'];

    public function Programs(){
        return $this->belongsToMany(Program::class, 'program_trainer');
    }

    public function Categories(){
        return $this->belongsToMany(Category::class, 'category_trainer');
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

     protected $hidden = ['token', 'password'];

}
