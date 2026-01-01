<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Faculty;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Faculty::create([
            'name' => 'Факультет ИТ',
            'description' => 'Программирование, Искусственный Интеллект и Big Data',
            'budget_places' => 25,
            'education_years' => 4
        ]);

        Faculty::create([
            'name' => 'Экономический',
            'description' => 'Мировая экономика, финансы и бухгалтерский учет',
            'budget_places' => 15,
            'education_years' => 4
        ]);

        Faculty::create([
            'name' => 'Юридический',
            'description' => 'Гражданское право, адвокатура и судебное дело',
            'budget_places' => 10,
            'education_years' => 5
        ]);


        Application::factory(10)->create();

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
