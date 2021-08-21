<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laraking</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('stylesheet')
    </head>
    <body>
        <div class="container">
            @include('common.header')
            @yield('content')
        </div>
    </body>
</html>
