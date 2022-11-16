<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Иван',
            'second_name' => 'Иванов',
            'patronymic'=> 'Иванович',
            'gender' => 'Мужской',
            'email' => 'admin@test.test',
            'birth_date' => '2022-01-01',
            'phone' => 9111111111,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'image' => ''
        ]);
        $role=Role::findByName('admin');
        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'Иван',
            'second_name' => 'Иванов',
            'patronymic'=> 'Иванович',
            'gender' => 'Мужской',
            'email' => 'student@test.test',
            'birth_date' => '2022-01-01',
            'phone' => 9111321111,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'image' => ''
        ]);
        $role=Role::findByName('listener');
        $user->assignRole([$role->id]);
        $user = User::create([
            'name' => 'Иван',
            'second_name' => 'Иванов',
            'patronymic'=> 'Иванович',
            'gender' => 'Мужской',
            'email' => 'admin2@test.test',
            'phone' => 9111111111,
            'birth_date' => '2022-01-01',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'image' => ''
        ]);
        $role=Role::findByName('admin');
        $user->assignRole([$role->id]);
    }
}
