<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::create([
            'full_name' => 'Иван',
            'phone' => '+7(999)-999-99-99',
            'email' => 'ivan@mail.ru',
            'login' => 'ivan',
            'password' => Hash::make('123456'),
            'is_admin' => true,
        ]);

        $services = [
            ['name' => 'Общий клининг'],
            ['name' => 'Генеральная уборка'],
            ['name' => 'Послестроительная уборка'],
            ['name' => 'Химчистка ковров'],
            ['name' => 'Химчистка мебели'],
        ];

        foreach ($services as $service) {
            Service::create(['name' => $service['name']]);
        }
    }
}
