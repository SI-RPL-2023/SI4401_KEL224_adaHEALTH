<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adaHEALTH</title>
    <link rel="stylesheet" href="{{ asset('asset/app.css') }}" />
    @vite('resources/css/app.css')
</head>
<body>
    @include('layout.navbar')

    @yield('content')

</body>
</html>
