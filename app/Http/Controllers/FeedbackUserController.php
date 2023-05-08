<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FeedbackUser;
use App\Models\User;

class FeedbackUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('create', 'store');
    }

    public function show()
    {
        $user = auth()->user();
        $existingFeedback = FeedbackUser::where('user_id', $user->id)->first();
        $feedbacks = FeedbackUser::all();
        if ($existingFeedback) {
            // Jika pengguna sudah memberikan feedback, tampilkan feedback yang sudah dikirim
            return view('FeedbackUser', ['feedback' => $existingFeedback], compact('feedbacks'));
        } else {
            // Jika pengguna belum memberikan feedback, tampilkan formulir feedback
            return view('FeedbackUser', compact('feedbacks'));
        }
    }

    public function store(Request $request){
        if (Auth::check()) {
            $request->validate([
                'feedback' => 'required',
            ]);

            FeedbackUser::create([
                'user_id' => Auth::id(),
                'feedback' => $request->feedback,
            ]);

            return redirect()->route('feedback.show')->with('success', 'Feedback berhasil dikirim!');
        }
    }

    public function update(Request $request, $id)
    {
        // validasi data
        $validatedData = $request->validate([
            'feedback' => 'required|string',
        ]);

        // mencari feedback dari user
        $feedback = FeedbackUser::where('user_id', auth()->user()->id)->first();

        // jika feedback ditemukan, update feedback
        if ($feedback) {
            $feedback->feedback = $validatedData['feedback'];
            $feedback->save();

            return redirect()->route('feedback.show')->with('success', 'Feedback berhasil diupdate');
        }

        // jika feedback tidak ditemukan, tampilkan error
        return redirect()->route('feedback.show')->with('error', 'Feedback tidak ditemukan');
    }




}
