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
        $role->syncPermissions(array(1,2,3,5));

        Role::create(['name'=>'listener']);
        $role=Role::findByName('listener');
        $role->syncPermissions(array(4));
    }
}
