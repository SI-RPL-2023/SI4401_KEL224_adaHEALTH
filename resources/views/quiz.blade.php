@extends('layout.layout')

@section('content')
<div class="quiz-container flex justify-center items-center h-screen">
  <div class="w-3/4">
    <div class="card border border-gray-300 shadow-md p-6">
      <div class="question">
        <h3>Soal {{ $currentQuestion['number'] }}</h3>
        <p>{{ $currentQuestion['question_text'] }}</p>
      </div>
      <form id="quiz-form" action="{{ route('quiz.submit') }}" method="POST">
        @csrf
        <div class="options">
          @foreach ($currentQuestion['options'] as $option)
          <div class="form-check">
            <input class="form-check-input" type="radio" name="answer" id="option{{ $option['id'] }}" value="{{ $option['id'] }}" {{ isset($answeredQuestions[$currentQuestion['number']]) && $answeredQuestions[$currentQuestion['number']] == $option['id'] ? 'checked' : '' }} required>
            <label class="form-check-label" for="option{{ $option['id'] }}">
              {{ $option['option_text'] }}
            </label>
          </div>
          @endforeach
        </div>
        <input type="hidden" name="question_number" value="{{ $currentQuestion['number'] }}">
        @if ($currentQuestion['number'] == $lastQuestionNumber)
        <button type="submit" class="btn btn-primary">Submit</button>
        @else
        <button type="button" class="btn btn-primary" onclick="saveAnswerAndNext()">Next</button>
        @endif
      </form>
    </div>
  </div>
  <div class="w-1/4">
      <div class="card border border-gray-300 shadow-md p-6 h-full">
        <div class="navigation">
          <h4>Navigasi Soal</h4>
          <div class="flex flex-wrap gap-4">
            @foreach ($questions as $question)
              <div class="w-1/5">
                <button type="button" class="btn btn-primary mb-2 w-full" onclick="goToQuestion({{ $question['number'] }})" {{ isset($answeredQuestions[$question['number']]) ? 'style=background-color:green' : '' }}>{{ $question['number'] }}</button>
              </div>
              <script>
                document.addEventListener('DOMContentLoaded', function() {
                  var questionNumber = {{ $question['number'] }};
                  var answer = localStorage.getItem('answer_' + questionNumber);
                  if (answer) {
                    document.getElementById('option' + answer).checked = true;
                  }
                });
              </script>
              @if ($loop->iteration % 5 === 0)
                <div class="w-full"></div>
              @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>
</div>

<script>
  // Fungsi untuk melanjutkan ke pertanyaan berikutnya dan menyimpan jawaban
  function saveAnswerAndNext() {
    var form = document.getElementById('quiz-form');
    var selectedOption = form.querySelector('input[name="answer"]:checked');
    if (selectedOption) {
      var questionNumber = parseInt(form.querySelector('input[name="question_number"]').value);
      localStorage.setItem('answer_' + questionNumber, selectedOption.value);
      form.submit();
    } else {
      alert('Silakan pilih jawaban sebelum melanjutkan!');
    }
  }

  // Fungsi navigasi soal
  function goToQuestion(questionNumber) {
    var form = document.getElementById('quiz-form');
    var selectedOption = form.querySelector('input[name="answer"]:checked');
    if (selectedOption) {
      var currentQuestionNumber = parseInt(form.querySelector('input[name="question_number"]').value);
      localStorage.setItem('answer_' + currentQuestionNumber, selectedOption.value);
    }
    window.location.href = "{{ route('quiz.show', '') }}/" + questionNumber;
  }
</script>
@endsection
