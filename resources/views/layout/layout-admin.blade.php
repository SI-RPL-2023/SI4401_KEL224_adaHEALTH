<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adaHEALTH</title>
    <link rel="stylesheet" href="{{ asset('asset/app.css') }}" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/@fullcalendar/core/main.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/@fullcalendar/daygrid/main.min.css" />
    <style>
        .bg-gradient{
            /* background-image: linear-gradient( 109.6deg,  rgba(79,148,243,0.73) 11.2%, rgba(140,105,193,0.87) 91.2% ); */
            background-image: linear-gradient( 90.6deg,  rgb(104, 174, 243) -1.2%, rgb(101, 91, 211) 98.6% );
        }
        .bg-gradient2{
            background-image: linear-gradient( 179.7deg,  rgba(197,214,227,1) 2.9%, rgba(144,175,202,1) 97.1% );
        }
    </style>
</head>
<body>

    @include('layout.header')
    @yield('content')

</body>
</html>
