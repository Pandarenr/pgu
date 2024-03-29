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
        DB::table('program_categories')->insert($data);
        
        \App\Models\Review::factory(15)->create();
        \App\Models\EducationForm::factory(4)->create();
        \App\Models\ListenerCategory::factory(4)->create();
        \App\Models\Program::factory(15)->create();
    }
}
