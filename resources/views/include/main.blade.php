<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    @include('include.header')

    @if(Request::is('/'))
        @include('include.hero')
    @endif

    <div class="container mt-3">
        <div class="row">
            <div class="col-4">
                @include('include.aside')
            </div>
            <div class="col-8">
                @yield('content')
            </div>
        </div>
    </div>

    @include('include.footer');

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>