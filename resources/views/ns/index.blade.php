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
            <a href="#" class="navbar-brand">
                <img src="{{ url('img/profilePic/'.Auth::user()->img) }}" alt="Foto de perfil" style="width: 30px; height: 30px; border-radius: 50%;">
            </a>
        @else
            <a class="navbar-brand" href="{{ route('ns.login') }}">Perfil</a>
        @endif
        </div>
    </nav>
    <h2 class="text-light text-center">Bienvenido a NAW STALL!</h2>
    <h3 class="text-light text-center">Newsletter</h3>

    <ul class="text-light">
        @foreach($entries as $entry)
            <li>
                <h2>{{ $entry->title }}</h2>
                <p>{{ $entry->summary }}</p>
                <p>Publicado el: {{ $entry->published }}</p>
                <a href="{{ $entry->id }}">Enlace</a>
                @if(isset($entry->link))
                    @foreach($entry->link as $link)
                        @if(isset($link['href']))
                            <img src="{{ $link['href'] }}" alt="">
                        @endif
                    @endforeach
                @endif
            </li>
        @endforeach
    </ul>
</body>

</html>
