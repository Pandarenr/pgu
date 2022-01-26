<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [   'name' => 'test',
                'email' => 'test@test.test',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );
        DB::table('users')->insert(
            [   'name' => 'test2',
                'email' => 'test2@test.test',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );
        $data = [
            ['name'=>'Физическая культура и спорт'],
            ['name'=>'Педагог профессионального обучения'],
            ['name'=>'ИЗО и МХК'],
            ['name'=>'Информационные технологии'],
        ];
        DB::table('subjects')->insert($data);
        \App\Models\User::factory(10)->create();
        \App\Models\Course::factory(15)->create();

    }
}
