<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Obat;

class ObatLukaKulitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Obat::create([
            'nama' => 'Povidon Iodin',
            'jenis' => 'Antiseptik',
            'kategori' => 'Luka Kulit',
            'deskripsi' => 'Digunakan untuk membersihkan luka dan membunuh bakteri di sekitarnya.',
            'harga' => 12000,
            'qty' => 40,
            'photo' => 'https://picsum.photos/200/300'
          ]);

          Obat::create([
            'nama' => 'Neomycin',
            'jenis' => 'Antibiotik topikal',
            'kategori' => 'Luka Kulit',
            'deskripsi' => 'Digunakan untuk mencegah infeksi pada luka terbuka.',
            'harga' => 15000,
            'qty' => 30,
            'photo' => 'https://picsum.photos/200/300'
          ]);

          Obat::create([
            'nama' => 'Mupirocin',
            'jenis' => 'Salep antibiotik',
            'kategori' => 'Luka Kulit',
            'deskripsi' => 'Digunakan untuk mengobati infeksi pada luka terbuka.',
            'harga' => 20000,
            'qty' => 50,
            'photo' => 'https://picsum.photos/200/300'
          ]);

          Obat::create([
            'nama' => 'Lidokain',
            'jenis' => 'Analgesik topikal',
            'kategori' => 'Luka Kulit',
            'deskripsi' => 'Digunakan untuk meredakan rasa sakit pada luka terbuka.',
            'harga' => 18000,
            'qty' => 20,
            'photo' => 'https://picsum.photos/200/300'
          ]);

          Obat::create([
            'nama' => 'Hidrokortison',
            'jenis' => 'Steroid topikal',
            'kategori' => 'Luka Kulit',
            'deskripsi' => 'Digunakan untuk mengurangi peradangan dan gatal pada luka kulit.',
            'harga' => 22000,
            'qty' => 15,
            'photo' => 'https://picsum.photos/200/300'
          ]);

    }
}
