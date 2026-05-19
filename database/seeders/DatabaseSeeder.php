<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarMark;
use App\Models\CarModel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'full_name' => 'Иван Васильевич Герасимов',
            'login' => 'avto2024',
            'email' => 'admin@mail.ru',
            'phone' => '+7 (914) 777 77 77',
            'role' => 'admin',
            'password' => 'poehali',
        ]);
        CarMark::create([
            'car_mark' => 'Toyota',
        ]);
        CarMark::create([
            'car_mark' => 'Dodge',
        ]);
        CarMark::create([
            'car_mark' => 'Subaru',
        ]);
        CarModel::create([
            'car_model' => 'Camry',
        ]);
         CarModel::create([
            'car_model' => 'B4',
        ]);
         CarModel::create([
            'car_model' => 'Forester',
        ]);
         CarModel::create([
            'car_model' => 'Charger',
        ]);
         CarModel::create([
            'car_model' => 'Corolla',
        ]);
    }
}
