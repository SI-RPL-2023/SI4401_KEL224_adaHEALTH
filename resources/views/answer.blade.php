@extends('layout.layout')

@section('content')
<div class="container my-24 px-6 mx-auto">
    <a href="{{ url('/help') }}">back</a>
    <h2 class="text-3xl font-bold mb-6">Answer</h2>

    <div class="mb-12">
        <h3 class="text-lg font-bold mb-3">Question:</h3>
        <p>{{ $question->messages }}</p>
    </div>

    <div class="mb-12">
        <h3 class="text-lg font-bold mb-3">Answer:</h3>
        @forelse ($question->answers as $answer)
            <p>{{ $answer->answer }}</p>
        @empty
            <p>No answer available.</p>
        @endforelse
    </div>

    @php
        $isAdminAnswered = $question->answers()->where('user_id', auth()->user()->id)->exists();
    @endphp

    @if(auth()->user()->roles == '1' && !$isAdminAnswered && $question->answers->isEmpty())
    <div class="mb-12">
        <h3 class="text-lg font-bold mb-3">Add Your Answer:</h3>
        <form method="POST" action="{{ route('submit.answer') }}">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            <input type="hidden" name="user_id" value="{{ $question->user_id }}">

            <div class="form-group mb-6">
                <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="description" rows="3" placeholder="Your answer" required></textarea>
            </div>

            <button type="submit" class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                Jawab
            </button>
        </form>
    </div>
    @endif
</div>
@endsection
