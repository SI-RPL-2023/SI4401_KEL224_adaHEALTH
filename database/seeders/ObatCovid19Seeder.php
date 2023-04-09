<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Obat;
use Illuminate\Support\Facades\Http;
class ObatCovid19Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Obat::create([
            'nama' => 'Remdesivir',
            'jenis' => 'Antiviral',
            'kategori' => 'COVID-19',
            'deskripsi' => 'Obat antiviral untuk mengobati COVID-19 dengan menghambat replikasi virus',
            'harga' => 1500000,
            'qty' => 50,
            'photo' => 'https://picsum.photos/200/300'
        ]);

        Obat::create([
            'nama' => 'Bamlanivimab',
            'jenis' => 'Antibodi Monoklonal',
            'kategori' => 'COVID-19',
            'deskripsi' => 'Antibodi monoklonal untuk mengobati COVID-19 dengan membantu melawan virus dan mencegah perkembangan penyakit',
            'harga' => 2500000,
            'qty' => 30,
            'photo' => 'https://picsum.photos/200/300'
        ]);

        Obat::create([
            'nama' => 'Deksametason',
            'jenis' => 'Steroid',
            'kategori' => 'COVID-19',
            'deskripsi' => 'Steroid untuk mengurangi peradangan dan membantu meredakan gejala COVID-19',
            'harga' => 500000,
            'qty' => 100,
            'photo' => 'https://picsum.photos/200/300'
        ]);

        Obat::create([
            'nama' => 'Heparin',
            'jenis' => 'Antikoagulan',
            'kategori' => 'COVID-19',
            'deskripsi' => 'Antikoagulan untuk mencegah pembekuan darah dan komplikasi trombotik yang dapat terjadi pada pasien COVID-19',
            'harga' => 750000,
            'qty' => 80,
            'photo' => 'https://picsum.photos/200/300'
        ]);

        Obat::create([
            'nama' => 'Ibuprofen',
            'jenis' => 'Obat-Obatan Anti-Inflamasi Nonsteroid (NSAID)',
            'kategori' => 'COVID-19',
            'deskripsi' => 'Obat-obatan anti-inflamasi nonsteroid (NSAID) untuk meredakan gejala COVID-19 yang ringan hingga sedang',
            'harga' => 250000,
            'qty' => 120,
            'photo' => 'https://picsum.photos/200/300'
        ]);
    }
}
