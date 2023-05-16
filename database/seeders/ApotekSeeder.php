<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ApotekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('apotek')->insert([
                'name' => $faker->company,
                'description' => $faker->sentence,
                'phone_number' => $faker->phoneNumber,
                'provinsi' => $faker->state,
                'kota' => $faker->city,
                'alamat_lengkap' => $faker->address,
                'images' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
