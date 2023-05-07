<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="bg-[#665EBB] w-screen h-screen flex justify-center items-center">

        <div class=" card bg-white w-[1280px] h-[600px] rounded-[35px] flex justify-center items-center flex-col drop-shadow-2xl">
            <div class="flex">
                <div class="flex flex-col items-center">
                    <img class="w-[200px] h-[200px] mt-[-40px]" src="{{url('asset/logo2.png')}}" alt="">
                    <h1 class="font-bold text-[#909090] text-[20px] mt-[-12px]">Register</h1>
                    <form action="{{ route('register') }}" method="POST" class="flex justify-center items-center flex-col text-start">
                        @csrf
                        <label class="text-[#909090] mt-[17px]" for="">Email</label>
                        <input type="text" class="w-[400px] h-[38px] border-b-2 border-[#909090] focus:outline-none" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span>{{ $message }}</span>
                        @enderror

                        <label class="text-[#909090]" for="">Phone</label>
                        <input type="text" class="w-[400px] h-[38px] border-b-2 border-[#909090] focus:outline-none" id="phone" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                            <span>{{ $message }}</span>
                        @enderror

                        <label class="text-[#909090]" for="">Password</label>
                        <input type="text" class="w-[400px] h-[38px] border-b-2 border-[#909090] focus:outline-none"  id="password" name="password" value="{{ old('password') }}">
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror
                        <label class="text-[#909090]" for="password_confirmation">Confirm-Password</label>
                        <input type="text" class="w-[400px] h-[38px] border-b-2 border-[#909090] focus:outline-none"  id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror

                        <button class="bg-[#665ebb] w-[400px] h-[51px] mt-[36px] text-white text-[16px] rounded-[15px]" type="submit">Register</button>
                        <div class="flex mt-[36px]">
                            <p class="text-[#909090] pr-[20px]">Term of use</p>
                            <div class="border-l-2 border-[#909090] pl-[20px]"></div>
                            <p class="text-[#909090]">Privacy Polices</p>

                        </div>
                    </form>
                </div>
                <div class="flex justify-center items-center">
                    <div class="w-[1px] h-[250px] bg-[#909090] ml-[95px]"></div>
                    <img class="w-[29px] h-[29px] ml-[70px]" src="{{url('asset/googlelogo.png')}}" alt="">
                    <p class="mr-[-384px] ml-[11px] text-[16px]">Sign up with Google account</p>
                </div>

            </div>

            <button class="bg-[#3F55AC] drop-shadow-lg opacity-90 w-[200px] h-[51px] ml-[1250px] mt-[-50px] text-white text-[12px] rounded-[15px]">Already have account?<span class="text-[#1600FF]"> <a href="{{ url('/login') }}">Here</a> </span></button>


        </div>



</body>
</html>
