<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'nama' => 'Pelatihan (Sertifikasi)',
            'deskripsi' => '
            Pelatihan secara online atau daring.
            Anda bisa mendapatkan promo menarik untuk mengikuti sesi pelatihan ini !
            ',
            'kategori' => 'Sertifikasi',
            'spesialis' => 'Spesialis layanan 1',
            'lokasi' => 'Daring',
        ]);

        Service::create([
            'nama' => 'Rekomendasi Rumah Sakit',
            'deskripsi' => 'Pelajari cara mengembangkan Rumah Sakit Anda dengan fasilitas yang kami rekomendasikan.',
            'kategori' => 'Rumah Sakit',
        ]);

        Service::create([
            'nama' => 'Rekomendasi Apotek',
            'deskripsi' => 'Pelajari cara mengembangkan apotek Anda dengan fasilitas yang kami rekomendasikan.',
            'kategori' => 'Apotek',
        ]);
        Service::create([
            'nama' => 'Rekomendasi Obat',
            'deskripsi' => 'Pelajari cara mengembangkan pengetahuan kesehatan tentang obat yang anda sukai dengan fasilitas yang kami rekomendasikan.',
            'kategori' => 'Obat, Vitamin',
        ]);
        Service::create([
            'nama' => 'Chat Dokter Spesialis',
            'deskripsi' => '
            Layanan telemedisin
            yang siap siaga untuk bantu
            kamu hidup lebih sehat.

            Mengapa Harus Chat dengan Dokter Spesialis?
            Satu aplikasi untuk berbagai kebutuhan
            periksa dokter, tes lab hingga penebusan resep obat.

            Dapatkan rujukan ke pemeriksaan offline
            di RS atau pemeriksaan diagnostik jika diperlukan.

            Dapat diintegrasikan dengan asuransimu agar
            kebutuhan kesehatan online terjamin asuransi.
            ',
            'kategori' => 'Obat, Vitamin',
        ]);
    }
}
