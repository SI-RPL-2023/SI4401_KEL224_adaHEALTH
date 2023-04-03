<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama_user' => 'Testing',
            'email' => 'testing@gmail.com',
            'password' => Hash::make('12345678'),
            'alamat' => 'Bojongsoang',
            'no_telp' => '0812345678',
            'gender' => 'Laki - Laki',
            'tanggal_lahir' => '2001-12-20',
        ]);
    }
}