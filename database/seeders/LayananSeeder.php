<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Pelatihan
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

                // Chat Dokter Spesialis
                Service::create([
                    'nama' => 'Chat Dokter Spesialis',
                    'deskripsi' => 'Layanan konsultasi dengan dokter spesialis melalui chat.
                    Layanan telemedisin yang siap siaga untuk bantu kamu hidup lebih sehat.
                    Mengapa Harus Chat dengan Dokter Spesialis?.
                    Satu aplikasi untuk berbagai kebutuhan
                    periksa dokter, tes lab hingga penebusan resep obat.
                    Dapatkan rujukan ke pemeriksaan offline
                    di RS atau pemeriksaan diagnostik jika diperlukan.
                    Dapat diintegrasikan dengan asuransimu agar
                    kebutuhan kesehatan online terjamin asuransi.',
                    'kategori' => 'Konsultasi',
                    'durasi' => 30,
                    'biaya' => 50000,
                ]);

                // Layanan Kesehatan
                Service::create([
                    'nama' => 'Layanan Kesehatan',
                    'deskripsi' => 'Layanan umum dalam bidang kesehatan',
                    'kategori' => 'Kesehatan',
                    'durasi' => 45,
                    'biaya' => 0,
                ]);

                // Pelacakan Kesehatan
                Service::create([
                    'nama' => 'Pelacakan Kesehatan',
                    'deskripsi' => 'Layanan untuk memantau dan melacak kondisi kesehatan',
                    'kategori' => 'Kesehatan',
                    'durasi' => 60,
                    'biaya' => 0,
                ]);

                // Kalkulator BMI
                Service::create([
                    'nama' => 'Kalkulator BMI',
                    'deskripsi' => 'Yuk, ketahui berat badan ideal kamu dengan kalkulator BMI.
                    Layanan untuk menghitung indeks massa tubuh.
                    Manfaat Kalkulator BMI.
                    Bisa mengetahui indeks massa tubuh.
                    Mudah untuk mencari solusi berat badan.
                    Lebih waspada terhadap massa tubuh.
                    Jauhi obesitas.
                    ',
                    'disclaimer'=> 'BMI adalah alat penghitungan indeks massa tubuh yang dirancang
                     untuk memberikan perkiraan kasar tentang berat badan ideal seseorang berdasarkan
                     tinggi dan berat badannya. Namun, hasil kalkulator BMI tidak dapat dianggap sebagai
                      diagnosis medis atau pengganti saran medis yang diberikan oleh dokter atau profesional kesehatan lainnya.',
                    'kategori' => 'Kesehatan',
                    'durasi' => 15,
                    'biaya' => 0,
                ]);

                // Rekomendasi Rumah Sakit
                Service::create([
                    'nama' => 'Rekomendasi Rumah Sakit',
                    'deskripsi' => 'Layanan untuk memberikan rekomendasi rumah sakit terdekat.
                    Pelajari cara mengembangkan Rumah Sakit Anda dengan fasilitas yang kami rekomendasikan.',
                    'kategori' => 'Rekomendasi',
                    'durasi' => 10,
                    'biaya' => 0,
                ]);

                // Rekomendasi Apotek
                Service::create([
                    'nama' => 'Rekomendasi Apotek',
                    'deskripsi' => 'Layanan untuk memberikan rekomendasi apotek terdekat.
                    Pelajari cara mengembangkan apotek Anda dengan fasilitas yang kami rekomendasikan.',
                    'kategori' => 'Rekomendasi',
                    'durasi' => 10,
                    'biaya' => 0,
                ]);

                // Rekomendasi Obat
                Service::create([
                    'nama' => 'Rekomendasi Obat',
                    'deskripsi' => 'Layanan untuk memberikan rekomendasi obat sesuai gejala.
                    Pelajari cara mengembangkan pengetahuan kesehatan tentang obat yang anda sukai dengan fasilitas yang kami rekomendasikan.',
                    'kategori' => 'Rekomendasi',
                    'durasi' => 15,
                    'biaya' => 20.00,
                ]);
    }
}
