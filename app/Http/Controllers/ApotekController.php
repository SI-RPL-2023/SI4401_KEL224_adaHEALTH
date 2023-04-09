<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apotek;

use App\Models\ApotekRating;

class ApotekController extends Controller
{
    public function index()
    {
        $apoteks = Apotek::all();

        return view('rekomendasi-apotek', ['apoteks' => $apoteks], ['title'=>'Apotek']);
    }
    public function show($id)
    {
        $apotek = Apotek::find($id);

        $ratingCount = ApotekRating::where('apotek_id', $id)->count();
        $reviewCount = ApotekRating::where('apotek_id', $id)->whereNotNull('rating')->count();

        return view('detailapotek', ['apotek' => $apotek], ['title'=>'Detail Apotek',
        'sum' => ApotekRating::count('apotek_id'),
        'ratingCount' => $ratingCount,
        'reviewCount' => $reviewCount,
    ]);
    }
    public function createRating($id)
    {
        $apotek = Apotek::findOrFail($id);
        return view('detailapotek', compact('apotek'), ['title'=>'Detail Apotek']);
    }

    public function storeRating(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $user = auth()->user();

        $apotek = Apotek::findOrFail($id);

        // Check if the user has already rated this apotek
        $existingRating = ApotekRating::where('hospital_id', $apotek->id)
            ->where('user_id', $user->id)
            ->first();

        if ($existingRating) {
            return redirect()->route('apotek.show', ['id' => $apotek->id])
                ->with('error', 'Anda sudah memberikan rating pada rumah sakit ini sebelumnya.');
        }

        $apotekRating = new ApotekRating([
            'rating' => $request->input('rating'),
        ]);

        $apotekRating->apotek()->associate($apotek);
        $apotekRating->user()->associate($user);
        $apotekRating->save();

        return redirect()->route('apotek.show', ['id' => $apotek->id])
            ->with('success', 'Nilai berhasil diberikan.');
    }
}