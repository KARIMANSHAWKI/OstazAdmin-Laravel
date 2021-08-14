<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;


class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::create([
            'first_name' => Str::random(5),
            'last_name' => Str::random(5),
            'email' => Str::random(5).'@gmail.com',
            'password' => bcrypt(12345678),
            'phone' => '01010959072',
        ]);

        $user->assignRole('admin');

    }
}
