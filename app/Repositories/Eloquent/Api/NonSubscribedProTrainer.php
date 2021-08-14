<?php
namespace App\Repositories\Eloquent\Api;

use App\Repositories\Interfaces\Api\INonSubscribedProgram;
use App\Models\Trainer;
use App\Models\Program;


class NonSubscribedProTrainer implements INonSubscribedProgram{


    public function nonSubscribedPrograms(){
        $email = auth('sanctum')->user()->email;
        $trainer = Trainer::where('email', $email)->first();
        $tr_country = $trainer->country;


        $programIds = array();
        $programsStCountry = array();

        $subscribedPrograms =  $trainer->Programs;
        foreach ($subscribedPrograms as $program){
            array_push($programIds, $program->pivot->program_id );
        }

        $countryPrograms =  $tr_country->Programs;
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
