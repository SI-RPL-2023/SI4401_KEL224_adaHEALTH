<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    @if (session('success'))
    <div class="toast">
        <div class="alert alert-info">
            <div>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    </div>
    @endif

    <div class="bg-[#665EBB] w-screen h-screen flex justify-center items-center">

        <div class=" card bg-[#3F55AC] w-[1200px] h-[500px] rounded-[35px] flex justify-center items-center flex-col drop-shadow-2xl">
            <div class="flex">
                <div class="flex flex-col items-center">
                    <img class="w-[200px] h-[200px] mt-[-40px]" src="{{url('asset/logo.png')}}" alt="">
                    <h1 class="font-bold text-[#909090] text-[20px] mt-[-12px]">Welcome Back !</h1>

                    <form action="{{ url('login/proses') }}" method="POST" class="flex justify-center items-center flex-col text-start">
                        @csrf
                        <label class="text-[#909090] mt-[17px]" for="">Email</label>
                        <input autofocus type="text" class="w-[400px] h-[38px] border-b-2 border-[#909090] focus:outline-none  @error('email') is-invalid @enderror" type="email" name="email" :value="old('email')" autofocus autocomplete="email">
                        @error('email')
                        <div class="alert alert-error shadow-lg">
                            <div>
                              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                              <span>{{ $message }}</span>
                            </div>
                        </div>
                        @enderror

                        <label class="text-[#909090]" for="password">Password</label>
                        <input type="password" class="w-[400px] h-[38px] border-b-2 border-[#909090] focus:outline-none  @error('password') is-invalid @enderror"  type="password" name="password"  autocomplete="current-password">

                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <button class="bg-[#665ebb] w-[400px] h-[51px] mt-[36px] text-white text-[16px] rounded-[15px]" type="submit">Login</button>
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
                    <p class="mr-[-330px] ml-[9px] text-[16px]">Sign in with Google account</p>
                </div>

            </div>

            <button class="bg-[#3F55AC] drop-shadow-lg opacity-90 w-[200px] h-[51px] ml-[1250px] mt-[-50px] text-white text-[12px] rounded-[15px]">No have account?<span class="text-[#1600FF]"> <a href="{{ url('/register') }}">Here</a> </span></button>


        </div>



</body>
</html>
