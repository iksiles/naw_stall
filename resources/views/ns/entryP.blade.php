<!DOCTYPE html>
<html>

<head>
    <title>Naw Stall - {{ $plane->model }}</title>
    @include('ns.layouts.boot')
    @include('ns.layouts.theme')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
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

    <h3 class="text-light">{{ $plane->model }}</h3>

    <article class="text-light text-center">
    <div id="containetor" class="container d-flex">
        <img id="portada" src="{{ url('img/plane/'.$plane->img) }}" alt="img">
        <div id="labeler">
            <label><strong>{{ __('planes.manufacturer') }}</strong> {{ $plane->manufact }}</label>
            <label><strong>{{ __('planes.entryservice') }}</strong> {{ $plane->year }}</label>
            <label><strong>{{ __('planes.emptyweight') }}</strong> {{ $plane->weight }}</label>
            <div class="mx-4">
                <h3>{{ __('planes.variants') }}</h3>
            @foreach ($msfs as $vars)
                <a href="{{ route('ns.entryM', $vars->id) }}">{{ $vars->manufact }} {{ $vars->model }}</a>
            @endforeach
            </div>
        </div>
    </article>


</body>

</html>