<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Obat;

class ObatFluSeeder extends Seeder
{
    public function run()
    {
        Obat::create([
            'nama' => 'Loratadine',
            'jenis' => 'Antihistamin',
            'kategori' => 'Flu',
            'deskripsi' => 'Digunakan untuk mengatasi gejala flu yang disebabkan oleh alergi seperti hidung tersumbat, bersin-bersin, dan mata berair.',
            'harga' => 20000,
            'qty' => 50,
            'photo' => 'https://picsum.photos/200/300'
        ]);

        Obat::create([
            'nama' => 'Pseudoephedrine',
            'jenis' => 'Decongestant',
            'kategori' => 'Flu',
            'deskripsi' => 'Membantu mengurangi pembengkakan pada saluran udara dan sinus, sehingga dapat membantu meredakan hidung tersumbat, tekanan sinus, dan sakit kepala.',
            'harga' => 25000,
            'qty' => 30,
            'photo' => 'https://picsum.photos/200/300'
        ]);

        Obat::create([
            'nama' => 'Paracetamol',
            'jenis' => 'Analgesik',
            'kategori' => 'Flu',
            'deskripsi' => 'Digunakan untuk meredakan sakit kepala, sakit tubuh, dan demam yang sering terkait dengan flu.',
            'harga' => 15000,
            'qty' => 100,
            'photo' => 'https://picsum.photos/200/300'
        ]);

        Obat::create([
            'nama' => 'Guaifenesin',
            'jenis' => 'Expectorant',
            'kategori' => 'Flu',
            'deskripsi' => 'Membantu mengencerkan lendir dan dahak pada saluran pernapasan, sehingga dapat memudahkan mengeluarkannya dan membantu meredakan batuk.',
            'harga' => 18000,
            'qty' => 40,
            'photo' => 'https://picsum.photos/200/300'
        ]);

        Obat::create([
            'nama' => 'Oseltamivir',
            'jenis' => 'Antiviral',
            'kategori' => 'Flu',
            'deskripsi' => 'Dapat membantu mengurangi durasi dan keparahan gejala flu jika diberikan dalam waktu 48 jam setelah gejala pertama muncul.',
            'harga' => 50000,
            'qty' => 10,
            'photo' => 'https://picsum.photos/200/300'
        ]);

    }


}
