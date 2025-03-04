<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roleAdmin = Role::where('code', 'admin')->first()->id;
        $roleManager = Role::where('code', 'manager')->first()->id;
        $roleUser = Role::where('code', 'user')->first()->id;

        User::create([
            'surname' => 'Евсеев',
            'name' => 'Дмитрий',
            'patronymic' => 'Витальевич',
            'sex' => 1,
            'birthday' => '2005-11-04',
            'email' => 'dima112831@yandex.ru',
            'password' => 'dima112831@yandex.ru',
            'api_token' => null,
            'role_id' => $roleAdmin,
        ]);

        User::create([
            'surname' => 'Мотов',
            'name' => 'Алибала',
            'patronymic' => 'Эльманович',
            'sex' => 1,
            'birthday' => '2005-01-27',
            'email' => 'unilajar@mail.ru',
            'password' => 'unilajar@mail.ru',
            'api_token' => null,
            'role_id' => $roleManager,
        ]);

        User::create([
            'surname' => 'Уляхин',
            'name' => 'Василий',
            'patronymic' => 'Алексеевич',
            'sex' => 1,
            'birthday' => '1987-12-11',
            'email' => 'cristaldevil@mail.ru',
            'password' => 'cristaldevil@mail.ru',
            'api_token' => null,
            'role_id' => $roleUser,
        ]);

    }
}
