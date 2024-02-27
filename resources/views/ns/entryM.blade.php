<!DOCTYPE html>
<html>

<head>
    <title>Naw Stall - {{ $msfs->model }}</title>
    @include('ns.layouts.boot')
    @include('ns.layouts.theme')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
            <a class="navbar-brand" href="{{ back()->getTargetUrl() }}"><-</a>
            <a class="navbar-brand" href="{{ route('ns.index') }}">{{ __('titles.home') }}</a>
            <a class="navbar-brand" href="{{ route('ns.wiki') }}">{{ __('titles.wiki') }}</a>
            <a class="navbar-brand" href="#">{{ __('titles.forum') }}</a>
            @if (Auth::check()) <!-- Verificar si el usuario ha iniciado sesión -->
            <a href="{{ route('ns.profile') }}" class="navbar-brand">
                <img src="{{ url('img/profilePic/'.Auth::user()->img) }}" alt="Foto de perfil" style="width: 30px; height: 30px; border-radius: 50%;">
            </a>
        @else
            <a class="navbar-brand" href="{{ route('ns.login') }}">{{ __('titles.profile') }}</a>
        @endif
        </div>
    </nav>

    <h3 class="text-light">{{ $msfs->manufact }} {{ $msfs->model }}</h3>

    <article class="text-light text-center">
    <div id="containetor" class="container d-flex">
        <img id="portada" src="{{ url('img/plane/'.$msfs->img) }}" alt="img">
        <div id="labeler">
            <label><strong>{{ __('planes.manufacturer') }}</strong> {{ $msfs->manufact }}</label>
            <label><strong>{{ __('planes.entryservice') }}</strong> {{ $msfs->year }}</label>
            <label><strong>{{ __('planes.emptyweight') }}</strong> {{ $msfs->weight }}kg</label>
            <label><strong>{{ __('planes.enginetype') }}</strong> {{ $msfs->engineType }}</label>
            <label><strong>{{ __('planes.enginemanu') }}</strong> {{ $msfs->engineManu }}</label>
            <label><strong>{{ __('planes.cargocap') }}</strong> {{ $msfs->cargo }}kg</label>
            <label><strong>{{ __('planes.passcap') }}</strong> {{ $msfs->travelNum }}</label>
            <label><strong>{{ __('planes.fuelmaxcap') }}</strong> {{ $msfs->fuelCap }}l</label>
            <label><strong>{{ __('planes.maxalt') }}</strong> {{ $msfs->maxAlt }}m</label>
            <label><strong>{{ __('planes.maxvel') }}</strong> {{ $msfs->maxVel }}km/h</label>
            <label><strong>{{ __('planes.flyrange') }}</strong> {{ $msfs->flyRange }}km</label>
        </div>
    </article>


</body>

</html>