<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;

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
    public function submitForm(Request $request)
    {

        // Validasi form
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'messages' => 'required',
        ]);

        // Simpan data ke database
        $question = new Question();
        $question->name = $request->name;
        $question->email = $request->email;
        $question->messages = $request->messages;
        $question->user_id = $request->user_id;
        $question->save();

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->back()->with('success', 'Form submitted successfully.');
    }
}
