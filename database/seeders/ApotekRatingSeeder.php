<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ApotekRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID user dan hospital yang sudah ada
        $users = DB::table('users')->pluck('id');
        $apoteks = DB::table('apotek')->pluck('id');

        // Generate rating acak untuk setiap user dan hospital
        foreach ($users as $userId) {
            foreach ($apoteks as $apotekID) {
                DB::table('apotek_ratings')->insert([
                    'user_id' => $userId,
                    'apotek_id' => $apotekID,
                    'rating' => rand(1, 5), // Rating acak dari 1 hingga 5
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
