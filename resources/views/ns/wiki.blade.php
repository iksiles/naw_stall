<!DOCTYPE html>
<html>

<head>
    <title>Naw Stall - Newsletter</title>
    @include('ns.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('ns.index') }}">Index</a>
            <a class="navbar-brand" href="#">Wiki</a>
            <a class="navbar-brand" href="#">Foro</a>
            @if (Auth::check()) <!-- Verificar si el usuario ha iniciado sesión -->
            <a href="{{ route('ns.profile') }}" class="navbar-brand">
                <img src="{{ url('img/profilePic/'.Auth::user()->img) }}" alt="Foto de perfil" style="width: 30px; height: 30px; border-radius: 50%;">
            </a>
        @else
            <a class="navbar-brand" href="{{ route('ns.login') }}">Perfil</a>
        @endif
        </div>
    </nav>
    <h2 class="text-light text-center">Bienvenido a NAW STALL!</h2>
    <h3 class="text-light text-center">Wiki</h3>

    <article class="text-light text-center">
        @foreach
        <li>
            <img src="{{ url('img/plane/'.$plane->img) }}" alt="">
            <h2>{{ $plane->manufact }} {{ $plane->model }}</h2>
            <a href="{{ route('ns.show', $plane->id) }}"></a>
        </li>
        @endforeach
    </article>


</body>

</html>