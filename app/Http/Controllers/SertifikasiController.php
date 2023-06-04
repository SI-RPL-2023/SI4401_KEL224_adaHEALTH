<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class SertifikasiController extends Controller
{
    private $questions = [
        [
            'number' => 1,
            'question_text' => 'Ibu hamil diharuskan satu kali selama hamil untuk?',
            'options' => [
                ['id' => 1, 'option_text' => 'a. Imunisasi TT'],
                ['id' => 2, 'option_text' => 'b. ANC'],
                ['id' => 3, 'option_text' => 'c. mengikuti kelas ibu hamil'],
                ['id' => 4, 'option_text' => 'd. Periksa dokter gigi'],
                ['id' => 5, 'option_text' => 'e. USG']
            ],
            'correct_option_id' => 1,
        ],
        [
            'number' => 2,
            'question_text' => 'Usia anak diharuskan mendapatkan pelayanan kesehatan?',
            'options' => [
                ['id' => 6, 'option_text' => 'a. Makan siang'],
                ['id' => 7, 'option_text' => 'b. Konseling NAPZA'],
                ['id' => 8, 'option_text' => 'c. Konseling pra nikah'],
                ['id' => 9, 'option_text' => 'd. Konseling merokok'],
                ['id' => 10, 'option_text' => 'e. Skrining penyakit']
            ],
            'correct_option_id' => 10,
        ],
        [
            'number' => 3,
            'question_text' => 'Peraturan perundangan yang mengatur BPJS adalah:',
            'options' => [
                ['id' => 11, 'option_text' => 'a. UU No 36 / 2009'],
                ['id' => 12, 'option_text' => 'b. UU No 40 / 2004'],
                ['id' => 13, 'option_text' => 'c. UU No 24 / 2011'],
                ['id' => 14, 'option_text' => 'd. PP No 101 / 2012'],
                ['id' => 15, 'option_text' => 'e. Perpres No 12 / 2013']
            ],
            'correct_option_id' => 13,
        ],
        [
            'number' => 4,
            'question_text' => 'JKN merupakan salah satu asuransi sosial. Adapun ciri asuransi sosial antara lain adalah:',
            'options' => [
                ['id' => 16, 'option_text' => 'a. Profit'],
                ['id' => 17, 'option_text' => 'b. Sukarela'],
                ['id' => 18, 'option_text' => 'c. Bayar premi'],
                ['id' => 19, 'option_text' => 'd. Non Profit'],
                ['id' => 20, 'option_text' => 'e. Kuratif']
            ],
            'correct_option_id' => 19,
        ],
        [
            'number' => 5,
            'question_text' => 'Tujuan germas adalah agar masyarakat berperilaku hidup sehat sehingga berdampak pada:',
            'options' => [
                ['id' => 21, 'option_text' => 'a. Biaya berobat berkurang'],
                ['id' => 22, 'option_text' => 'b. Tidak merokok'],
                ['id' => 23, 'option_text' => 'c. Mengkonsumsi sayur/buah'],
                ['id' => 24, 'option_text' => 'd. Melakukan aktifitas'],
                ['id' => 25, 'option_text' => 'e. Menggunakan jamban']
            ],
            'correct_option_id' => 21,
        ],
        
    ];

    public function start()
    {
        Session::forget(['questions', 'score', 'answeredQuestions']);

        Session::put('questions', $this->questions);

        return redirect()->route('quiz.show', 1);
    }

    public function show($questionNumber)
    {
        $questions = Session::get('questions', $this->questions);

        $currentQuestion = collect($questions)->firstWhere('number', $questionNumber);

        if (!$currentQuestion) {
            return redirect()->route('quiz.result');
        }

        $answeredQuestions = Session::get('answeredQuestions', []);

        $lastQuestionNumber = collect($questions)->last()['number'];

        return view('quiz', compact('currentQuestion', 'questionNumber', 'questions', 'answeredQuestions', 'lastQuestionNumber'));
    }

    public function submit(Request $request)
    {
        $questionNumber = $request->input('question_number');
        $selectedOptionId = $request->input('answer');

        $questions = Session::get('questions', $this->questions);

        $answeredQuestions = Session::get('answeredQuestions', []);

        $answeredQuestions[$questionNumber] = $selectedOptionId;
        Session::put('answeredQuestions', $answeredQuestions);

        $currentQuestion = collect($questions)->firstWhere('number', $questionNumber);
        if ($currentQuestion['correct_option_id'] == $selectedOptionId) {
            $score = Session::get('score', 0);
            $score += 1;
            Session::put('score', $score);
        }

        $lastQuestionNumber = collect($questions)->last()['number'];
        if ($questionNumber == $lastQuestionNumber) {
            return $this->showResult();
        } else {
            $nextQuestionNumber = $questionNumber + 1;
            return redirect()->route('quiz.show', $nextQuestionNumber);
        }
    }

    public function showResult()
    {
        $questions = Session::get('questions', $this->questions);

        $answeredQuestions = Session::get('answeredQuestions', []);

        $score = 0;
        foreach ($questions as $question) {
            $questionNumber = $question['number'];
            $selectedOptionId = $answeredQuestions[$questionNumber] ?? null;

            if ($selectedOptionId !== null && $question['correct_option_id'] == $selectedOptionId) {
                $score += 1;
            }
        }

    
        return view('result', compact('questions', 'answeredQuestions', 'score'));
    }
        public function goToQuestion($questionNumber)
    {
        $questions = Session::get('questions', $this->questions);

        $answeredQuestions = Session::get('answeredQuestions', []);

        // Mengambil jawaban yang telah dijawab pada pertanyaan saat ini
        $currentQuestion = collect($questions)->firstWhere('number', $questionNumber);
        $selectedOptionId = $answeredQuestions[$questionNumber] ?? null;

        // Memperbarui jawaban pada pertanyaan sebelum pindah ke pertanyaan berikutnya
        if ($selectedOptionId !== null) {
            $answeredQuestions[$currentQuestion['number']] = $selectedOptionId;
            Session::put('answeredQuestions', $answeredQuestions);
        }

        return redirect()->route('quiz.show', $questionNumber);
    }
}