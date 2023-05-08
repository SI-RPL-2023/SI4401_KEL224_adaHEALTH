@extends('layout.layout')

@section('content')
<div class="relative w-screen h-screen">
    <div class="bg-[#6A62C4] h-[303px] flex justify-center">
        <div class="w-[190px] h-[190px] flex justify-center items-center bg-white rounded-full absolute top-[209px] shadow-lg">
            <img src="{{ asset('/storage/'.$user->photo) }}" class="rounded-full w-[190px] h-[190px]" alt="userphoto">
        </div>
        <button class="w-[242px] h-[48px] bg-white text-red-500 absolute right-[88px] top-[119px] rounded-[20px] font-bold text-[20px] mt-[48px]">logout</button>
    </div>
    <div class="flex flex-col items-center justify-center">
        <h1 class="mt-[120px] text-[40px] font-medium text-[#444444]">{{ $user->email }}</h1>
        <h1 class="mt-[14px] text-[20px] text-[#444444]">Pribadi, {{ $user->phone }}</h1>
        <label for="my-modal" class="w-[242px] btn h-[48px] bg-[#6A62C4] text-white rounded-[20px] font-bold text-[20px] lowercase mt-[48px]">edit profile</label>
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
                        <label for="image" class="w-[64px] h-[64px] flex justify-center items-center bg-white rounded-full border">
                            <input type="file" name="image" class="hidden" id="image">
                            <img src="{{ asset('/storage/'.$user->photo) }}" class="rounded-full w-[64px] h-[64px]" alt="userphoto">
                        </label>
                        <label for="image" class="mt-[11px]">Edit</label>
                    </div>
                    <h1 class="text-start">Email<span class="text-red-500">*</span></h1>
                    <input type="text" name="email" class="w-full focus:outline-none border-b border-black mt-[6px]" value="{{ $user->email }}">
                    <h1 class="text-start mt-[18px]">Phone<span class="text-red-500">*</span></h1>
                    <input type="text" name="phone" class="w-full focus:outline-none border-b border-black mt-[6px]" value="{{ $user->phone }}">
                    <h1 class="text-start mt-[18px]">Password<span class="text-red-500">*</span></h1>
                    <input type="password" name="password" class="w-full focus:outline-none border-b border-black mt-[6px]" value="{{ $user->password }}">
                    <div class="flex w-full justify-center items-center">
                        <button type="submit" class="w-[242px] h-[48px] mt-[20px] bg-[#6A62C4] rounded-[20px] text-white font-semibold">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection