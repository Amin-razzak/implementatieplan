<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
        @include('layouts.head')

</head>

<body>
        @include('layouts.nav')
        <div class="container">
        @yield('content')
        </div>
        @include('layouts.scripts')
        @include('layouts.footer')
    </body>
</html>
