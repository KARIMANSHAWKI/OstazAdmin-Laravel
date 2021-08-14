<?php
namespace App\Repositories\Eloquent\Api;

use App\Repositories\Interfaces\Api\INonSubscribedProgram;
use App\Models\Student;
use App\Models\Program;


class NonSubscribedProStudent implements INonSubscribedProgram{

    public function nonSubscribedPrograms(){
        $email = auth('sanctum')->user()->email;
        $student = Student::where('email', $email)->first();
        $st_country = $student->country;
        $programIds = array();
        $programsStCountry = array();
        $subscribedPrograms =  $student->Programs;
        foreach ($subscribedPrograms as $program){
            array_push($programIds, $program->pivot->program_id );
        }

        $countryPrograms =  $st_country->Programs;
        foreach ($countryPrograms as $program){
            array_push($programsStCountry, $program->pivot->program_id );
        }

        $nonSubscribedPrograms = Program::whereNotIn('id', $programIds )->whereIn('id', $programsStCountry)->get();


        return response()->json([
            "status" => 200,
            'nonSubscribedPrograms' =>$nonSubscribedPrograms
        ]);





    }
}
