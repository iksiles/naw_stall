<!DOCTYPE html>
<html>

<head>
    <title>Naw Stall - {{ __('titles.wiki') }}</title>
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
    <h2 class="text-light text-center">{{ __('titles.welcome') }}</h2>
    <h3 class="text-light text-center">{{ __('titles.wiki') }}</h3>

    <article class="text-light text-center">
        @foreach ($plane as $planes)
        <li>
            <img src="{{ url('img/plane/'.$planes->img) }}" alt="">
            <h2>{{ $planes->manufact }} {{ $planes->model }}</h2>
            <a href="{{ route('ns.entryP', $planes->id) }}">{{ __('buttons.link') }}</a>
        </li>
        @endforeach
    </article>


</body>

</html>