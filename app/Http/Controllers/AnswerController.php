<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class AnswerController extends Controller
{
    public function show($question_id)
    {

        $question = Question::find($question_id);
        if ($question) {
            return view('answer', compact('question'));
        } else {

        }
    }
        public function store(Request $request)
        {


            $answer = new Answer();
            $answer->question_id = $request->input('question_id');
            $answer->user_id = $request->input('user_id');
            $answer->answer = $request->input('description');


            $answer->save();

            return redirect()->back()->with('success', 'Answer submitted successfully.');
        }

}
