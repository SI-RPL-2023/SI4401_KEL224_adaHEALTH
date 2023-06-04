@extends('layout.layout')

@section('content')
<div class="relative w-screen h-screen">
    <div class="bg-[#6A62C4] h-[303px] flex justify-center">
        <div class="w-[190px] h-[190px] flex justify-center items-center bg-white rounded-full absolute top-[209px] shadow-lg">
            <img src="{{asset('upload/profile/'.$user->photo)}}" class="rounded-full w-[190px] h-[190px]" alt="userphoto">
        </div>
        <button class="w-[242px] h-[48px] bg-white text-red-500 absolute right-[88px] top-[119px] rounded-[20px] font-bold text-[20px] mt-[48px]">logout</button>
        <button for="my-modal-3" class="">Ganti Password</button>
        <!-- The button to open modal -->
        <label for="my-modal-3" class="btn btn-ghost w-[242px] h-[48px] bg-white text-blue-500 absolute right-[88px] top-[179px] rounded-[20px] font-bold text-[20px] mt-[48px]">Ganti Password</label>

        <!-- Put this part before </body> tag -->
        <input type="checkbox" id="my-modal-3" class="modal-toggle" />
        <div class="modal">
        <div class="modal-box relative">
            <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h3 class="text-lg font-bold">Change Your Password!</h3>
            <form action="{{ route('ganti.password', ['id' => Auth::user()->id]) }}" method="POST">
                @csrf
                <h1 class="text-start mt-[18px]">Password<span class="text-red-500">*</span></h1>
                <input type="password" name="password" class="w-full focus:outline-none border-b border-black mt-[6px]" value="{{ $user->password }}">
                <button type="submit" class="btn btn-primary mt-5">Update Password</button>
            </form>
        </div>
        </div>
    </div>
    <div class="flex flex-col items-center justify-center">
        <h1 class="mt-[120px] text-[40px] font-medium text-[#444444]">{{ $user->email }}</h1>
        <h1 class="mt-[14px] text-[20px] text-[#444444]">Pribadi, {{ $user->phone }}</h1>
        <label for="my-modal" class="w-[242px] btn h-[48px] bg-[#6A62C4] text-white rounded-[20px] font-bold text-[20px] lowercase mt-[48px]">edit profile</label>
        <form method="POST" action="{{ route('hapusfoto', ['id' => Auth::user()->id]) }}">
            @csrf
            @method('POST')
            <button type="submit" class="mt-[11px] text-red-500">Hapus Foto</button>
        </form>
    </div>
    <input type="checkbox" id="my-modal" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box">
            <div class="flex items-center justify-between">
                <h3 class="font-bold text-lg">Edit Profile</h3>
                <label for="my-modal">
                        X
                </label>
            </div>
            <div class="flex flex-col items-center">
                <form enctype="multipart/form-data" method="POST" action="{{ route('updateProfile.put', ['id' => Auth::user()->id]) }}" class="flex flex-col items-start w-full">
                    @csrf
                    @method('PUT')
                    <div class="w-full flex flex-col justify-center items-center">
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block text-sm font-medium leading-6 text-gray-900">Upload Images</label>
                            <div class="flex items-center justify-center w-full">
                            <label for="thumbnail" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG</p>
                                </div>
                                <input id="thumbnail" type="file" name="photo" accept=".jpg,.jpeg,.png" class="hidden" />
                            </label>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <figure class="max-w-lg mx-auto mt-6">
                                @if($user->photo != null)
                                <img class="h-auto max-w-full rounded-lg mx-auto" src="{{asset('upload/profile/'.$user->photo)}}" width="300" height="300" id="images" alt="image description">
                                <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400" id="image-caption">{{ $user->photo }}</figcaption>
                                @else
                                <img class="h-auto max-w-full rounded-lg mx-auto" src="{{asset('images/thumbnail.jpg')}}" id="images" alt="image description">
                                <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400" id="image-caption">Image Caption</figcaption>
                                @endif
                            </figure>
                        </div>
                    </div>

                    <h1 class="text-start">Name<span class="text-red-500">*</span></h1>
                    <input type="text" name="name" class="w-full focus:outline-none border-b border-black mt-[6px]" value="{{ $user->name }}">

                    <h1 class="text-start mt-[18px]">Date of Birth<span class="text-red-500">*</span></h1>
                    <input type="date" name="date_birth" class="w-full focus:outline-none border-b border-black mt-[6px]" value="{{ $user->date_birth }}">

                    <h1 class="text-start mt-[18px]">Gender<span class="text-red-500">*</span></h1>
                    @if ($user->gender)
                        <p>{{ $user->gender }}</p>
                        <input type="hidden" name="gender" class="w-full focus:outline-none border-b border-black mt-[6px]" value="{{ $user->gender }}">
                    @else
                    <div class="form-control">
                        <label class="label cursor-pointer">
                          <span class="label-text">Laki-Laki</span>
                          <input type="radio" name="gender" value="Laki-Laki" class="radio checked:bg-red-500" checked />
                        </label>
                      </div>
                      <div class="form-control">
                        <label class="label cursor-pointer">
                          <span class="label-text">Perempuan</span>
                          <input type="radio" name="gender" value="Perempuan" class="radio checked:bg-blue-500" checked />
                        </label>
                    </div>
                    @endif
                    {{-- <input type="text" name="gender" class="w-full focus:outline-none border-b border-black mt-[6px]" value="{{ $user->gender }}"> --}}

                    <h1 class="text-start mt-[18px]">Address<span class="text-red-500">*</span></h1>
                    <input type="text" name="address" class="w-full focus:outline-none border-b border-black mt-[6px]" value="{{ $user->address }}">

                    <h1 class="text-start mt-[18px]">Email<span class="text-red-500">*</span></h1>
                    <input type="text" name="email" class="w-full focus:outline-none border-b border-black mt-[6px]" value="{{ $user->email }}">

                    <h1 class="text-start mt-[18px]">Phone<span class="text-red-500">*</span></h1>
                    <input type="text" name="phone" class="w-full focus:outline-none border-b border-black mt-[6px]" value="{{ $user->phone }}">


                    <div class="flex w-full justify-center items-center">
                        <button type="submit" class="w-[242px] h-[48px] mt-[20px] bg-[#6A62C4] rounded-[20px] text-white font-semibold">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script>

        $('#thumbnail').change(function() {
            var file = $('#thumbnail')[0].files[0].name;
            $('#image-caption').text(file);
        });
        // image preview
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#images').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#thumbnail").change(function(){
            readURL(this);
        });
        // END of image preview
        </script>
@endsection
