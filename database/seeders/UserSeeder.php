<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'telp' => '083636782',
            'profile' => 'profile.png',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'is_admin' => true
        ]);

        User::create([
            'name' => 'Ale',
            'telp' => '01234567',
            'profile' => 'profile.png',
            'email' => 'ale@gmail.com',
            'password' => Hash::make('aleale123')
        ]);

        User::create([
            'name' => 'IanBom',
            'telp' => '0987654',
            'profile' => 'profile.png',
            'email' => 'ianbom@gmail.com',
            'password' => Hash::make('ianbom123')
        ]);

        User::factory()->count(200)->create();
    }
}
