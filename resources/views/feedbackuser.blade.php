@extends('layout.layout')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <label class=" text-gray-700 font-bold mb-2 mt-10 flex items-center justify-center">Feedback Aplikasi</label>
        @if (session('success'))
        <div class="alert alert-success shadow-lg">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
              <span>{{ session('success') }}</span>
            </div>
        </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger shadow-lg">
                {{ session('error') }}
            </div>
        @endif
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-10">
            @if (isset($feedback))
                <div class="my-4">
                    <h3 class="text-lg font-semibold mb-2">Feedback Anda:</h3>
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <div class="mb-4">
                            <div class="flex justify-end">
                                <div class=" badge badge-accent badge-outline">{{ $feedback->created_at }}</div>
                            </div>
                            <label for="feedback" class="block text-gray-700 font-bold mb-2">Feedback:</label>
                            <p>{{ $feedback->feedback }}</p>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="button" class="bg-[#2ac28a] hover:bg-gray-400 text-white py-2 px-4 rounded-lg mr-2" onclick="toggleFeedbackForm()">Ubah Feedback</button>
                        </div>

                    </div>
                </div>
                <div id="feedback-form" class="hidden bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="POST" action="{{ route('feedback.update', $feedback->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mt-5">
                                <label for="feedback" class="block text-gray-700 font-bold mb-2">Ada pesan yang ingin disampaikan? tulis dibawah ya:</label>
                                <textarea id="feedback" name="feedback" rows="10"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('feedback') border-red-500 @enderror"
                                    required>{{ $feedback->feedback }}</textarea>

                                @error('feedback')
                                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex items-center justify-center mt-4">
                                <button> <a href="{{ route('feedback.show') }}" class="bg-gray-500 w-52 hover:bg-gray-700 text-white p-1.5 ml-1.5  rounded-full">
                                    Batal</a>
                                </button>
                                <button type="submit" class="bg-[#6A62C4] w-52 text-white hover:bg-sky-700 p-1.5 ml-1.5 rounded-full">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
            <div class="p-6 bg-white border-b border-gray-200">

                <form method="POST" action="{{ route('feedback.store') }}">
                    @csrf

                    <div class="mt-5">
                        <label for="feedback" class="block text-gray-700 font-bold mb-2">Ada pesan yang ingin disampaikan? tulis dibawah ya:</label>
                        <textarea id="feedback" name="feedback" rows="10"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('feedback') border-red-500 @enderror"
                            required>{{ old('feedback') }}</textarea>

                        @error('feedback')
                        <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-center mt-4 ">
                        <button type="submit" class="bg-[#6A62C4] w-52 text-white hover:bg-sky-700 p-1.5 ml-1.5 rounded-full">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
            @endif
            <script>
                function toggleFeedbackForm() {
                    var form = document.getElementById('feedback-form');
                    if (form.classList.contains('hidden')) {
                        form.classList.remove('hidden');
                    } else {
                        form.classList.add('hidden');
                    }
                }
            </script>
            <h3 class="text-lg font-semibold mb-2">Semua Feedback :</h3>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-10">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($feedbacks->count() > 0)
                        <h3 class="text-lg font-semibold mb-2">Feedback dari user lainnya:</h3>

                        @foreach ($feedbacks as $other)
                            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                <div class="mb-4">
                                    <label for="feedback" class="block text-gray-700 font-bold mb-2">Feedback:</label>
                                    <p>{{ $other->feedback }}</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="text-gray-600 text-sm">{{ $other->user->name }}</p>
                                    <p class="text-sm badge badge-accent badge-outline">{{ $other->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center text-gray-600">Belum ada feedback dari user lainnya.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
