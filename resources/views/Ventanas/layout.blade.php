<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('titulo', 'Investigacion')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    </head>
    <body>
        <div class="container">
            @yield('contenido')
        </div>
        @yield('footer')
    </body>
</html>