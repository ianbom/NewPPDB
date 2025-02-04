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
        $pertanyaan = [
            ['tipe' => 'text', 'pertanyaan' => 'NAMA TANPA GELAR'],
            ['tipe' => 'text', 'pertanyaan' => 'GELAR AKADEMIK'],
            ['tipe' => 'text', 'pertanyaan' => 'TEMPAT LAHIR'],
            ['tipe' => 'date', 'pertanyaan' => 'TANGGAL LAHIR'],
            ['tipe' => 'radio', 'pertanyaan' => 'JENIS KELAMIN', 'opsi_A' => 'LAKI-LAKI', 'opsi_B' => 'PEREMPUAN'],
            ['tipe' => 'radio', 'pertanyaan' => 'STATUS NIKAH', 'opsi_A' => 'KAWIN', 'opsi_B' => 'BELUM KAWIN'],
            ['tipe' => 'text', 'pertanyaan' => 'NO. KTP'],
            ['tipe' => 'text', 'pertanyaan' => 'NO TELPON/HP/WA'],
            ['tipe' => 'text', 'pertanyaan' => 'EMAIL'],
            ['tipe' => 'radio', 'pertanyaan' => 'BIDANG PPG', 'opsi_A' => 'PENDIDIKAN AGAMA ISLAM'],
            ['tipe' => 'radio', 'pertanyaan' => 'BERSEDIA MENGIKUTI PPG SAMPAI SELESAI', 'opsi_A' => 'BERSEDIA', 'opsi_B' => 'TIDAK BERSEDIA'],
            ['tipe' => 'text', 'pertanyaan' => 'GOLONGAN DARAH'],
            ['tipe' => 'radio', 'pertanyaan' => 'WARGA NEGARA', 'opsi_A' => 'WNI', 'opsi_B' => 'WNA'],
            ['tipe' => 'text', 'pertanyaan' => 'PROVINSI'],
            ['tipe' => 'text', 'pertanyaan' => 'KABUPATEN'],
            ['tipe' => 'text', 'pertanyaan' => 'KECAMATAN'],
            ['tipe' => 'text', 'pertanyaan' => 'ALAMAT LENGKAP'],
            ['tipe' => 'radio', 'pertanyaan' => 'JENJANG PENDIDIKAN TERAKHIR', 'opsi_A' => 'SMA', 'opsi_B' => 'S1', 'opsi_C' => 'S2', 'opsi_D' => 'S3'],
            ['tipe' => 'text', 'pertanyaan' => 'ASAL SEKOLAH'],
            ['tipe' => 'text', 'pertanyaan' => 'NISN/NIM (diisi NISN sekolah/SMA dan NIM kuliah)'],
            ['tipe' => 'text', 'pertanyaan' => 'NOMOR IJAZAH'],
            ['tipe' => 'text', 'pertanyaan' => 'NAMA AYAH'],
            ['tipe' => 'radio', 'pertanyaan' => 'KEADAAN AYAH', 'opsi_A' => 'MASIH HIDUP', 'opsi_B' => 'ALMARHUM'],
            ['tipe' => 'text', 'pertanyaan' => 'NIK AYAH (jika tidak ada, boleh isi NIK abang kandung/wali lain yang lebih tua dari peserta PPG)'],
            ['tipe' => 'text', 'pertanyaan' => 'TEMPAT LAHIR AYAH'],
            ['tipe' => 'date', 'pertanyaan' => 'TANGGAL LAHIR AYAH'],
            ['tipe' => 'text', 'pertanyaan' => 'AGAMA'],
            ['tipe' => 'text', 'pertanyaan' => 'ALAMAT AYAH'],
            ['tipe' => 'text', 'pertanyaan' => 'KABUPATEN'],
            ['tipe' => 'text', 'pertanyaan' => 'PENDIDIKAN AYAH'],
            ['tipe' => 'text', 'pertanyaan' => 'PEKERJAAN AYAH'],
            ['tipe' => 'radio', 'pertanyaan' => 'KEADAAN IBU', 'opsi_A' => 'MASIH HIDUP', 'opsi_B' => 'ALMARHUMAH'],
            ['tipe' => 'text', 'pertanyaan' => 'NAMA IBU'],
            ['tipe' => 'text', 'pertanyaan' => 'NIK IBU (jika tidak ada boleh diisiskan NIK kakak kadung atau keluarga lain yang lebih tua dari peserta PPG)'],
            ['tipe' => 'text', 'pertanyaan' => 'TEMPAT LAHIR IBU'],
            ['tipe' => 'date', 'pertanyaan' => 'TANGGAL LAHIR IBU'],
            ['tipe' => 'text', 'pertanyaan' => 'AGAMA'],
            ['tipe' => 'text', 'pertanyaan' => 'ALAMAT IBU'],
            ['tipe' => 'text', 'pertanyaan' => 'KABUPATEN'],
            ['tipe' => 'text', 'pertanyaan' => 'NO. HP/WA'],
            ['tipe' => 'text', 'pertanyaan' => 'PENDIDIKAN IBU'],
            ['tipe' => 'text', 'pertanyaan' => 'PEKERJAAN IBU'],
            ['tipe' => 'text', 'pertanyaan' => 'HUBUNGAN DENGAN WALI'],
            ['tipe' => 'text', 'pertanyaan' => 'NIK WALI'],
            ['tipe' => 'text', 'pertanyaan' => 'NAMA WALI'],
            ['tipe' => 'text', 'pertanyaan' => 'TEMPAT LAHIR WALI'],
            ['tipe' => 'date', 'pertanyaan' => 'TANGGAL LAHIR WALI'],
            ['tipe' => 'text', 'pertanyaan' => 'AGAMA'],
            ['tipe' => 'text', 'pertanyaan' => 'ALAMAT WALI'],
            ['tipe' => 'file', 'pertanyaan' => 'KTP ASLI (PDF)'],
            ['tipe' => 'file', 'pertanyaan' => 'IJAZAH ASLI (PDF)'],
            ['tipe' => 'file', 'pertanyaan' => 'TRANSKRIP NILAI ASLI (PDF)'],
            ['tipe' => 'file', 'pertanyaan' => 'SERTIFIKAT AKREDITASI PRODI DAN PERGURUAN TINGGI (PDF)'],
            ['tipe' => 'file', 'pertanyaan' => 'SK PEMBAGIAN TUGAS MENGAJAR 3 TAHUN TERAKHIR (PDF)'],
            ['tipe' => 'file', 'pertanyaan' => 'Pindai persetujuan dari kepala madrasah/sekolah untuk mengikuti PPG (PDF)'],
            ['tipe' => 'file', 'pertanyaan' => 'PAKTA INTEGRITAS (bahwa dokumen yang diserahkan dapat dipertanggung jawabkan keabsahanya) (PDF)'],
            ['tipe' => 'file', 'pertanyaan' => 'SURAT PENYETARAAN DARI KEMENDIKBUD ATAU DIREKTORAT JENDERAL PENDIDIKAN ISLAM (bagi peserta yang memiliki ijazah S-1 dari luar negari) (PDF)'],
            ['tipe' => 'file', 'pertanyaan' => 'SURAT KETERANGAN SEHAT DARI DOKTER PEMERINTAH (PDF)'],
            ['tipe' => 'file', 'pertanyaan' => 'PAS FOTO TERBARU (Image)'],
            ['tipe' => 'radio', 'pertanyaan' => 'KATEGORI PESERTA', 'opsi_A' => 'K1', 'opsi_B' => 'K2']
        ];

        foreach ($pertanyaan as $data) {
            Pertanyaan::create($data);
        }
    }
}
