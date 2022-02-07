<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'admin']);
        $role=Role::findByName('admin');
        $role->syncPermissions(array(2,4,5,6));

        Role::create(['name'=>'head']);
        $role=Role::findByName('head');
        $role->syncPermissions(array(2,4,5));

        Role::create(['name'=>'teacher']);
        $role=Role::findByName('teacher');
        $role->syncPermissions(array(1));

        Role::create(['name'=>'user']);
        $role=Role::findByName('user');
        $role->syncPermissions(array(3));
    }
}
