<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;


class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Program::create([
            "name" => "Physics",
            "category_id" => 4
        ]);

    }
}
