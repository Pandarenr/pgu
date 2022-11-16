<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'post-edit',
            'user-edit',
            'listener-request-edit',
            'listener-own-request-edit',
            'program-edit'
        ];

        foreach ($data as $permission) {
            Permission::create(['name' => $permission]);
       }
    }
}
