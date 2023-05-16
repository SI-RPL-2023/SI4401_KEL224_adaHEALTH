<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HospitalRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID user dan hospital yang sudah ada
        $users = DB::table('users')->pluck('id');
        $hospitals = DB::table('hospitals')->pluck('id');

        // Generate rating acak untuk setiap user dan hospital
        foreach ($users as $userId) {
            foreach ($hospitals as $hospitalId) {
                DB::table('hospital_ratings')->insert([
                    'user_id' => $userId,
                    'hospital_id' => $hospitalId,
                    'rating' => rand(1, 5), // Rating acak dari 1 hingga 5
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
