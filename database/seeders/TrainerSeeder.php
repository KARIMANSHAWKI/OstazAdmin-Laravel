<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trainer;
use Illuminate\Support\Str;

class TrainerSeeder extends Seeder
{

    public function run()
    {
        Trainer::create([
            'first_name' => 'roqay',
            'last_name' => 'mohamed',
            'email' => Str::random(5).'@gmail.com',
            'phone' => '01010959072',
            'age' => 20,
            'gender' => 'm',
            'country_id' => rand(1,12),
        ]);
    }
}
