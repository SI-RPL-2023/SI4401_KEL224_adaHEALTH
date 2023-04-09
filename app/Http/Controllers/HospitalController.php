<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;

use App\Models\HospitalRating;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::all();

        return view('rekomendasirs', ['hospitals' => $hospitals], ['title'=>'Hospital']);
    }
    public function show($id)
    {
        $hospital = Hospital::find($id);

        if (!$hospital) {
            abort(404);
        }

        $ratingCount = HospitalRating::where('hospital_id', $id)->count();
        $reviewCount = HospitalRating::where('hospital_id', $id)->whereNotNull('rating')->count();

        return view('detailrs', ['hospital' => $hospital], ['title'=>'Detail RS',
        'sum' => HospitalRating::count('hospital_id'),
        'ratingCount' => $ratingCount,
        'reviewCount' => $reviewCount,
    ]);
    }
    // public function rate(Request $request, $id)
    // {
    //     $hospital = Hospital::findOrFail($id);
    //     $hospital->rating = $request->rating;
    //     $hospital->save();
    //     return redirect()->route('hospital.show', ['id' => $hospital->id])->with('success', 'Nilai berhasil diberikan');
    // }

    public function createRating($id)
    {
        $hospital = Hospital::findOrFail($id);
        return view('detailrs', compact('hospital'), ['title'=>'Detail RS']);
    }

    public function storeRating(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $user = auth()->user();

        $hospital = Hospital::findOrFail($id);

        // Check if the user has already rated this hospital
        $existingRating = HospitalRating::where('hospital_id', $hospital->id)
            ->where('user_id', $user->id)
            ->first();

        if ($existingRating) {
            return redirect()->route('hospital.show', ['id' => $hospital->id])
                ->with('error', 'Anda sudah memberikan rating pada rumah sakit ini sebelumnya.');
        }

        $hospitalRating = new HospitalRating([
            'rating' => $request->input('rating'),
        ]);

        $hospitalRating->hospital()->associate($hospital);
        $hospitalRating->user()->associate($user);
        $hospitalRating->save();

        return redirect()->route('hospital.show', ['id' => $hospital->id])
            ->with('success', 'Nilai berhasil diberikan.');
    }


}


