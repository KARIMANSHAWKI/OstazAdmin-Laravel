<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TrainerProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('program_trainer')->insert([
            'program_id' => rand(1,21),
            'trainer_id' => rand(1,16),
        ]);
    }
}
