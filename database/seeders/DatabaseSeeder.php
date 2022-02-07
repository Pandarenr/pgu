<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class,
        ]);

        $data = [
            ['name'=>'Физическая культура и спорт'],
            ['name'=>'Педагог профессионального обучения'],
            ['name'=>'ИЗО и МХК'],
            ['name'=>'Информационные технологии'],
        ];
        DB::table('subjects')->insert($data);
        \App\Models\Course::factory(15)->create();
    }
}
