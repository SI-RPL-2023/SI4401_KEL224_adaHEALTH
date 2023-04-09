<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Obat;

class ObatSakitGigiSeeder extends Seeder
{

        public function run()
        {
            Obat::create([
                'nama' => 'Paracetamol',
                'jenis' => 'Analgesik',
                'kategori' => 'Sakit Gigi',
                'deskripsi' => 'Digunakan untuk meredakan rasa sakit akibat sakit gigi.',
                'harga' => 10000,
                'qty' => 50,
                'photo' => 'https://picsum.photos/200/300'
            ]);

            Obat::create([
                'nama' => 'Chlorhexidine',
                'jenis' => 'Antiseptik',
                'kategori' => 'Sakit Gigi',
                'deskripsi' => 'Digunakan untuk membunuh bakteri di sekitar area gigi yang sakit, sehingga dapat membantu mengurangi rasa sakit dan peradangan.',
                'harga' => 15000,
                'qty' => 30,
                'photo' => 'https://picsum.photos/200/300'
            ]);

            Obat::create([
                'nama' => 'Ibuprofen',
                'jenis' => 'Anti-inflamasi nonsteroid (AINS)',
                'kategori' => 'Sakit Gigi',
                'deskripsi' => 'Digunakan untuk meredakan rasa sakit dan peradangan yang terkait dengan sakit gigi.',
                'harga' => 20000,
                'qty' => 100,
                'photo' => 'https://picsum.photos/200/300'
            ]);

            Obat::create([
                'nama' => 'Benzocaine',
                'jenis' => 'Anestesi topikal',
                'kategori' => 'Sakit Gigi',
                'deskripsi' => 'Digunakan untuk meredakan rasa sakit di area gigi dan gusi.',
                'harga' => 12000,
                'qty' => 40,
                'photo' => 'https://picsum.photos/200/300'
            ]);

            Obat::create([
                'nama' => 'Amoxicillin',
                'jenis' => 'Antibiotik',
                'kategori' => 'Sakit Gigi',
                'deskripsi' => 'Digunakan untuk mengobati infeksi gigi yang parah dan memerlukan pengobatan medis.',
                'harga' => 30000,
                'qty' => 10,
                'photo' => 'https://picsum.photos/200/300'
            ]);

        }
}
