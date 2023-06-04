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
    public function show($question_id)
    {
        // Lakukan logika untuk menampilkan halaman jawaban pertanyaan dengan ID $question_id

        // Contoh:
        $question = Question::find($question_id);
        if ($question) {
            return view('answer', compact('question'));
        } else {
            // Pertanyaan tidak ditemukan, lakukan penanganan sesuai kebutuhan Anda
        }
    }

    public function store(Request $request)
    {
        // Validasi input jika diperlukan

        $answer = new Answer();
        $answer->question_id = $request->input('question_id');
        $answer->user_id = $request->input('user_id');
        $answer->answer = $request->input('description');
        // Tambahkan logika lainnya sesuai kebutuhan

        $answer->save();

        return redirect()->back()->with('success', 'Answer submitted successfully.');
    }
}
