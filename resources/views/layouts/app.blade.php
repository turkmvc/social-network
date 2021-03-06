<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user" content="{{ auth()->user() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Social-App</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-social">

        <div class="container">

            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fa fa-address-book text-primary mr-1"></i>
                Social-App
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    {{--<li class="nav-item active">
                        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>--}}
                </ul>
                <ul class="navbar-nav ml-auto">

                    @if(!auth()->user())

                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Registrar</a></li>
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>

                    @else

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('users.show', auth()->user()) }}">Perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"
                                    onclick="document.getElementById('logout').submit()"
                                >
                                    Cerrar Sesion
                                </a>
                            </div>
                        </li>

                        <form action="{{ route('logout') }}" id="logout" method="post">@csrf</form>

                    @endif

                </ul>
            </div>

        </div>
    </nav>

    <main id="app" class="py-4">
        @yield('content')
    </main>


    <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>