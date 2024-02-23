<!DOCTYPE html>
<html>

<head>
    <title>Naw Stall - {{ $msfs->model }}</title>
    @include('ns.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('ns.index') }}">Index</a>
            <a class="navbar-brand" href="{{ route('ns.wiki') }}">Wiki</a>
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

    <h3 class="text-light">{{ $msfs->manufact }} {{ $msfs->model }}</h3>

    <article class="text-light text-center">
    <div id="containetor" class="container d-flex">
        <img id="portada" src="{{ url('img/plane/'.$msfs->img) }}" alt="img">
        <div id="labeler">
            <label><strong>Manufacturadora:</strong> {{ $msfs->manufact }}</label>
            <label><strong>Entrada en servicio:</strong> {{ $msfs->year }}</label>
            <label><strong>Peso en vacío:</strong> {{ $msfs->weight }}kg</label>
            <label><strong>Tipo de motor:</strong> {{ $msfs->engineType }}</label>
            <label><strong>Manufacturador/es del o de los motor/es:</strong> {{ $msfs->engineManu }}</label>
            <label><strong>Capacidad de carga:</strong> {{ $msfs->cargo }}kg</label>
            <label><strong>Capacidad de pasajeros:</strong> {{ $msfs->travelNum }}</label>
            <label><strong>Capacidad de combustible máxima:</strong> {{ $msfs->fuelCap }}l</label>
            <label><strong>Techo de vuelo:</strong> {{ $msfs->maxAlt }}m</label>
            <label><strong>Velocidad máxima:</strong> {{ $msfs->maxVel }}km/h</label>
            <label><strong>Rango de vuelo:</strong> {{ $msfs->flyRange }}km</label>
        </div>
    </article>


</body>

</html>