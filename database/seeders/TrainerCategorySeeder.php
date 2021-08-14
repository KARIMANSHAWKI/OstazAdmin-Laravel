<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TrainerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_trainer')->insert([
            'category_id' => rand(1,5),
            'trainer_id' => rand(1,16),
        ]);
    }
}
