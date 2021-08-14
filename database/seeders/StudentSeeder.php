<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Str;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'first_name' => Str::random(5),
            'last_name' => Str::random(5),
            'email' => Str::random(5).'@gmail.com',
            'phone' => '01010959072',
            'age' => 20,
            // 'status' => 1,
            'gender' => 'm',
            'country_id' => rand(1,12),
        ]);

    }
}
