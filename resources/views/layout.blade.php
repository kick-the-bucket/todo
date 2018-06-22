<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ToDo</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @routes
    </head>
    <body class="bg-light">
        <div class="container">
            <nav class="navbar navbar-dark"></nav>

            @yield('content')
        </div>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>