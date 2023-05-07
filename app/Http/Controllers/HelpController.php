<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;


class HelpController extends Controller
{
    public function index()
    {
        // Ambil semua pertanyaan dari tabel 'questions'
        $questions = Question::all();

        // Looping untuk setiap pertanyaan
        foreach ($questions as $question) {
            // Ambil semua jawaban yang terkait dengan pertanyaan tersebut
            $answers = Answer::where('question_id', $question->id)->get();

            // Tampilkan pertanyaan beserta jawaban dalam view
            $question->answers = $answers;
        }

        // Tampilkan view dengan data pertanyaan dan jawaban
        return view('help', compact('questions'), ['title'=>'Help']);
    }
}
