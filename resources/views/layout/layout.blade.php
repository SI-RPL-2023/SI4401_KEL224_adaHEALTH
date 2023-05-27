<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adaHEALTH</title>
    <link rel="stylesheet" href="{{ asset('asset/app.css') }}" />
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <script src="{{ asset('js/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    @vite('resources/css/app.css')
</head>
<body>
    @include('layout.navbar')

    @yield('content')
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>
