<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\TrainerSeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\ProgramSeeder;
use Database\Seeders\TrainerProgramSeeder;
use Database\Seeders\TrainerCategorySeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\SupervisorSeeder;





class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            CategorySeeder::class,
            TrainerSeeder::class,
            CountrySeeder::class,
            ProgramSeeder::class,
            StudentSeeder::class,
            PermissionSeeder::class,
            SupervisorSeeder::class
        ]);
    }
}
