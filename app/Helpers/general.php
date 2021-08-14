<?php

use App\Models\Student;
use App\Models\Trainer;

function getGender($gender){
    if ($gender =='f') {
       return "Female";
    } else {
        return "Male";
    }
}


function getStatus($status){
    if ($status =='0') {
       return "Not Active";
    } else {
        return "Active";
    }
}

function userType(){
    $email =  auth('sanctum')->user()->email;

    if(Student::where('email', $email)->first()){
        return "student";
    }else{
        return "trainer";
    }


}

