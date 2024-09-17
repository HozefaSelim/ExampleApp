<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Your Custom CSS -->
    @vite('resources/css/app.css')
    @yield('css')

</head>

<body>
    @include('partials.header')

   @if (session('error'))

        <div class="alert alert-danger">
            {{ session('error')}}
        </div>
       
   @endif

   @if (session('success'))

        <div class="alert alert-success">
            {{ session('success')}}
        </div>
       
   @endif


    @yield('content')


    @include('partials.footer')
    @yield('js')

    <!-- Include Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
