<?php

namespace Database\Seeders;

use App\Models\Pertanyaan;
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
        $this->call([
            PertanyaanSeeder::class,
            StatusSeeder::class,
            UserSeeder::class,
        ]);
    }
}
