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
        $users = [
            [
                'email' => 'testing@gmail.com',
                'password' => Hash::make('12345678'),
                'phone' => '0812345678',
                'name' => 'Testing',
                'roles'=> 0
            ],
            [
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'phone' => '0812345679',
                'name' => 'Administrator',
                'roles'=> 1
            ],
            [
                'email' => 'dokter@gmail.com',
                'password' => Hash::make('12345678'),
                'phone' => '08123456710',
                'name' => 'Dokter',
                'roles'=> 2
            ],


        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
