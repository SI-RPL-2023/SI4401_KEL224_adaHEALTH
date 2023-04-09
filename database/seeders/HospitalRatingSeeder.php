<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hospital;
use App\Models\HospitalRating;
use App\Models\User;

class HospitalRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // mendapatkan semua data rumah sakit
        // $hospitals = Hospital::all();

        // // mendapatkan semua data pengguna
        // $users = User::all();

        // // untuk setiap rumah sakit, tambahkan beberapa rating
        // foreach ($hospitals as $hospital) {
        //     for ($i = 1; $i <= 5; $i++) {
        //         $rating = new HospitalRating();
        //         $rating->hospital_id = $hospital->id;
        //         $rating->user_id = $users->random()->id;
        //         $rating->rating = rand(1, 5);
        //         $rating->save();
        //     }
        // }
    }
}
