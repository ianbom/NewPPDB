<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'tipe' => 'verifikasi',
            'judul' => 'lolos Verifikasi',
            'deskripsi' => 'Selamat lolos verifikasi'
        ]);

        Status::create([
            'tipe' => 'administrasi',
            'judul' => 'lolos administrasi',
            'deskripsi' => 'Selamat lolos administrasi'
        ]);

        Status::create([
            'tipe' => 'lolos',
            'judul' => 'Luluss',
            'deskripsi' => 'Selamat lolos seleksi'
        ]);
    }
}
