<?php
namespace App\Repositories\Eloquent\Api;

use App\Repositories\Interfaces\Api\ISubscribedProgram;
use App\Models\Trainer;
use App\Models\Program;


class SubscribedProTrainer implements ISubscribedProgram{

    public function subscribedPrograms(){
        $email = auth('sanctum')->user()->email;
        $trainer = Trainer::where('email', $email)->first();
        $programIds = array();
        $subscribedPrograms =  $trainer->Programs;
        foreach ($subscribedPrograms as $program){
            array_push($programIds, $program->pivot->program_id );
        }

        $programs = Program::whereIn('id', $programIds )->get();


        return response()->json([
            "status" => 200,
            'subscribedPrograms' =>$programs
        ]);





    }
}
