<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Obat;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $obats = Obat::all();
        $metodePembayaran = ['OVO', 'DANA', 'LINK AJA', 'GOPAY'];

        foreach ($users as $user) {
            $obat = $obats->random();
            $qty = $obat->qty;

            // Pastikan qty_item yang dihasilkan tidak melebihi qty yang ada di Obat
            $qty_item = rand(1, min($qty, 10));
            Transaction::create([
                'id_user' => $user->id,
                'id_obat' => $obat->id,
                'type' => 'Pemesanan Obat',
                'qty_item' => $qty_item,
                'total_harga' => $qty_item * $obat->harga,
                'metode_payment' => $metodePembayaran[array_rand($metodePembayaran)],
                'status' => 'Pending',
                'images' => 'image1.jpg',
            ]);
            Transaction::create([
                'id_user' => $user->id,
                'id_obat' => $obat->id,
                'type' => 'Pemesanan Obat',
                'qty_item' => $qty_item,
                'total_harga' => $qty_item * $obat->harga,
                'metode_payment' => $metodePembayaran[array_rand($metodePembayaran)],
                'status' => 'Pending',
                'images' => 'image1.jpg',
            ]);
            Transaction::create([
                'id_user' => $user->id,
                'id_obat' => $obat->id,
                'type' => 'Pemesanan Obat',
                'qty_item' => $qty_item,
                'total_harga' => $qty_item * $obat->harga,
                'metode_payment' => $metodePembayaran[array_rand($metodePembayaran)],
                'status' => 'Selesai',
                'images' => 'image1.jpg',
            ]);
            Transaction::create([
                'id_user' => $user->id,
                'id_obat' => $obat->id,
                'type' => 'Pemesanan Obat',
                'qty_item' => $qty_item,
                'total_harga' => $qty_item * $obat->harga,
                'metode_payment' => $metodePembayaran[array_rand($metodePembayaran)],
                'status' => 'Selesai',
                'images' => 'image1.jpg',
            ]);                        
            Transaction::create([
                'id_user' => $user->id,
                'id_obat' => $obat->id,
                'type' => 'Pemesanan Obat',
                'qty_item' => $qty_item,
                'total_harga' => $qty_item * $obat->harga,
                'metode_payment' => $metodePembayaran[array_rand($metodePembayaran)],
                'status' => 'Gagal',
                'images' => 'image1.jpg',
            ]);
            Transaction::create([
                'id_user' => $user->id,
                'id_obat' => $obat->id,
                'type' => 'Pemesanan Obat',
                'qty_item' => $qty_item,
                'total_harga' => $qty_item * $obat->harga,
                'metode_payment' => $metodePembayaran[array_rand($metodePembayaran)],
                'status' => 'Gagal',
                'images' => 'image1.jpg',
            ]);

        
            // Tambahkan entri transaksi lainnya sesuai kebutuhan
        }
        
    }
}
