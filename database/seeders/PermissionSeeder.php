<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $models = ['trainers', 'students', 'permissions', 'countries', 'cites', 'proggrams', 'categories'];
        $maps = ['create', 'read', 'update', 'delete'];

        $arrayOfPermissionNames = [];

        foreach ($models as $model) {
            // result should be ['create_trainers' , 'create_students',...]

            foreach ($maps as $map) {
                $arrayOfPermissionNames[] = $map . '_' . $model;
            }
        }

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'superadmin'];
        });


        Permission::insert($permissions->toArray());





    }
}
