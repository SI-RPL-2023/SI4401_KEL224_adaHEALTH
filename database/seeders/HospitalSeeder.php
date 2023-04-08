<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Hospital;
use App\Models\User;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // $users = User::all();
        $hospitals = [
            [
                'name' => 'RS HasanSadikin',
                'description' => 'Rumah Sakit Hasan Sadikin adalah sebuah rumah sakit di Kota Bandung, Jawa Barat, Indonesia. Rumah sakit ini merupakan salah satu rumah sakit terbesar dan tertua di Indonesia, dengan sejarah yang panjang dan prestasi yang mengesankan. Rumah sakit ini awalnya didirikan sebagai Balai Pengobatan Umum pada tahun 1810, dan kemudian menjadi Rumah Sakit Umum pada tahun 1898. Sejak saat itu, rumah sakit ini terus berkembang dan menjadi salah satu pusat pelayanan kesehatan terkemuka di Indonesia. Saat ini, Rumah Sakit Hasan Sadikin memiliki fasilitas yang lengkap dan modern, serta tenaga medis yang terampil dan berpengalaman dalam memberikan pelayanan kesehatan terbaik kepada pasien.',
                'phone_number' => '024-8414405',
                'address' => 'Bandung, Jawa Barat',
                'images'=> 'hasansadikin.jpg',
                // 'user_id' => $users->random()->id,
            ],
            [
                'name' => 'RSUP Limijati',
                'description' => 'Rumah Sakit Limijati adalah sebuah rumah sakit yang terletak di Kota Semarang, Jawa Tengah, Indonesia. Rumah sakit ini memiliki layanan medis yang cukup lengkap, seperti layanan kesehatan untuk anak dan dewasa, layanan kesehatan reproduksi, layanan kesehatan mental, dan masih banyak lagi. Selain itu, rumah sakit ini juga dilengkapi dengan fasilitas modern yang memadai, termasuk ruang operasi, kamar rawat inap, ruang perawatan intensif, dan masih banyak lagi. Dengan dukungan tenaga medis yang profesional dan terlatih, Rumah Sakit Limijati siap memberikan layanan kesehatan terbaik kepada masyarakat.',
                'phone_number' => '0431-889470',
                'address' => ' Semarang , Jawa Tengah',
                'images'=> 'rslimijati.jpg',
                // 'user_id' => $users->random()->id,
            ],
            [
                'name' => 'RSUD Pindad',
                'description' => 'RSUD Pindad adalah sebuah rumah sakit yang terletak di kota Bandung, Jawa Barat, Indonesia. RSUD Pindad merupakan rumah sakit yang dikelola oleh Pemerintah Kota Bandung dan berdiri di atas lahan seluas sekitar 1,5 hektar. Rumah sakit ini memiliki fasilitas lengkap dan modern dengan pelayanan kesehatan yang berkualitas. RSUD Pindad memiliki berbagai layanan kesehatan seperti pelayanan rawat inap, rawat jalan, unit gawat darurat, serta berbagai spesialisasi medis seperti bedah, anak, mata, kandungan, jantung dan paru, serta lainnya. Selain itu, rumah sakit ini juga dilengkapi dengan berbagai fasilitas pendukung seperti laboratorium, radiologi, farmasi, dan rehabilitasi medis.RSUD Pindad juga memiliki tenaga medis yang terampil dan berpengalaman serta dilengkapi dengan teknologi medis yang modern untuk menunjang pelayanan kesehatan yang optimal. Rumah sakit ini berkomitmen untuk memberikan pelayanan kesehatan yang terbaik dan terpercaya bagi masyarakat sekitar dan sekitarnya.',
                'phone_number' => '024-6711380',
                'address' => 'Bandung, Jawa Barat',
                'images'=> 'rspindad.jpg',
                // 'user_id' => $users->random()->id,
            ],
            [
                'name' => 'RSUD Santosa',
                'description' => 'RSUD Santosa adalah sebuah rumah sakit yang terletak di kota Cimahi, Jawa Barat, Indonesia. Rumah sakit ini merupakan rumah sakit yang dikelola oleh Pemerintah Kota Cimahi dan berdiri di atas lahan seluas sekitar 2 hektar. RSUD Santosa memiliki fasilitas lengkap dan modern dengan pelayanan kesehatan yang berkualitas.RSUD Santosa menyediakan berbagai layanan kesehatan seperti pelayanan rawat inap, rawat jalan, unit gawat darurat, serta berbagai spesialisasi medis seperti bedah, anak, mata, kandungan, jantung dan paru, serta lainnya. Rumah sakit ini juga dilengkapi dengan berbagai fasilitas pendukung seperti laboratorium, radiologi, farmasi, dan rehabilitasi medis.RSUD Santosa juga memiliki tenaga medis yang terampil dan berpengalaman serta dilengkapi dengan teknologi medis yang modern untuk menunjang pelayanan kesehatan yang optimal. Rumah sakit ini berkomitmen untuk memberikan pelayanan kesehatan yang terbaik dan terpercaya bagi masyarakat sekitar dan sekitarnya.',
                'phone_number' => '0542-423120',
                'address' => 'Cimahi, Jawa Barat',
                'images'=> 'rssantosa.jpg',
                // 'user_id' => $users->random()->id,
            ],
            [
                'name' => 'RS Umum Bandung',
                'description' => 'RSUD Bandung adalah sebuah rumah sakit yang terletak di kota Bandung, Jawa Barat, Indonesia. Rumah sakit ini merupakan rumah sakit yang dikelola oleh Pemerintah Kota Bandung dan berdiri di atas lahan seluas sekitar 3,6 hektar. RSUD Bandung memiliki fasilitas lengkap dan modern dengan pelayanan kesehatan yang berkualitas.RSUD Bandung menyediakan berbagai layanan kesehatan seperti pelayanan rawat inap, rawat jalan, unit gawat darurat, serta berbagai spesialisasi medis seperti bedah, anak, mata, kandungan, jantung dan paru, serta lainnya. Rumah sakit ini juga dilengkapi dengan berbagai fasilitas pendukung seperti laboratorium, radiologi, farmasi, dan rehabilitasi medis.RSUD Bandung juga memiliki tenaga medis yang terampil dan berpengalaman serta dilengkapi dengan teknologi medis yang modern untuk menunjang pelayanan kesehatan yang optimal. Rumah sakit ini berkomitmen untuk memberikan pelayanan kesehatan yang terbaik dan terpercaya bagi masyarakat sekitar dan sekitarnya. Selain itu, RSUD Bandung juga berperan penting dalam memberikan pelayanan kesehatan bagi masyarakat kota Bandung dan sekitarnya, serta menjadi salah satu pusat rujukan medis di Jawa Barat.',
                'phone_number' => '0352-484564',
                'address' => 'Bandung, Jawa Barat',
                'images'=> 'rsudbandung.jpg',
                // 'user_id' => $users->random()->id,
            ],
            [
                'name' => 'RS Umum Al-Ihsan',
                'description' => 'RSUD Alihsan adalah sebuah rumah sakit yang terletak di kota Soreang, Kabupaten Bandung, Jawa Barat, Indonesia. Rumah sakit ini merupakan rumah sakit yang dikelola oleh Pemerintah Kabupaten Bandung dan berdiri di atas lahan seluas sekitar 4 hektar. RSUD Alihsan memiliki fasilitas lengkap dan modern dengan pelayanan kesehatan yang berkualitas.RSUD Alihsan menyediakan berbagai layanan kesehatan seperti pelayanan rawat inap, rawat jalan, unit gawat darurat, serta berbagai spesialisasi medis seperti bedah, anak, mata, kandungan, jantung dan paru, serta lainnya. Rumah sakit ini juga dilengkapi dengan berbagai fasilitas pendukung seperti laboratorium, radiologi, farmasi, dan rehabilitasi medis.RSUD Alihsan juga memiliki tenaga medis yang terampil dan berpengalaman serta dilengkapi dengan teknologi medis yang modern untuk menunjang pelayanan kesehatan yang optimal. Rumah sakit ini berkomitmen untuk memberikan pelayanan kesehatan yang terbaik dan terpercaya bagi masyarakat sekitar dan sekitarnya. RSUD Alihsan juga menjadi salah satu pusat rujukan medis di Kabupaten Bandung dan sekitarnya, serta berperan penting dalam meningkatkan kualitas kesehatan masyarakat di wilayah tersebut.',
                'phone_number' => '0352-484564',
                'address' => 'Soreang, Kabupaten Bandung, Jawa Barat',
                'images'=> 'rsudalihsan.jpg',
                // 'user_id' => $users->random()->id,
            ]
        ];
        foreach ($hospitals as $hospital) {
            $hospital['images'] = ( $hospital['images']);
            Hospital::create($hospital);
        }
    }


}
