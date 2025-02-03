<?php

namespace Database\Seeders;

use App\Models\Pertanyaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pertanyaan::create([
            'tipe' => 'text',
            'pertanyaan' => 'Sudah mandi belum ?'
        ]);

        Pertanyaan::create([
            'tipe' => 'date',
            'pertanyaan' => 'Lahir tanggal berapa ?'
        ]);

        Pertanyaan::create([
            'tipe' => 'file',
            'pertanyaan' => 'Upload pendukung ?'
        ]);

        Pertanyaan::create([
            'tipe' => 'radio',
            'pertanyaan' => 'Pernah main ml ?
                            A. Pernah
                            B. Belum'
        ]);
    }
}
