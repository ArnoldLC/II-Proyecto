<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>El Caminito - Soft</title>
</head>
<body>
    <div class="container">

        @include('layouts.header')

        <div class="container__dashboard">
            @include('layouts.sidebar')

            @include('layouts.board')
        </div>

    </div>
</body>
</html>