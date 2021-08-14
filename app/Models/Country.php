<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Trainer;
use App\Models\Program;


class Country extends Model
{
    use HasFactory;


    protected $fillable = ['name'];
    protected $hidden = ['_token'];

    public function trainers () {
        return $this->hasMany(Trainer::class, 'country_id');
    }

    public function students () {
        return $this->hasMany(Student::class, 'country_id');
    }

    public function Programs(){
        return $this->belongsToMany(Program::class, 'program_country');
    }
}
