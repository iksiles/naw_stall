<!DOCTYPE html>
<html>

<head>
    <title>Naw Stall - Newsletter</title>
    <!-- @include('ns.layouts.boot') -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

</head>

<body class="bg-red-600">
    <nav class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <a class="navbar-brand" href="{{ route('ns.index') }}">Index</a>
            <a class="navbar-brand" href="{{ route('ns.news') }}">Newsletter</a>
            <a class="navbar-brand" href="#">Wiki</a>
            <a class="navbar-brand" href="#">Opciones</a>
            <a class="navbar-brand" href="#">Foro</a>
        </div>
    </nav>
    <h2 class="text-white center uppercase">Bienvenido a NAW STALL!</h2>

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
                            <img src="{{ $link['href'] }}" alt=".">
                        @endif
                    @endforeach
                @endif
            </li>
        @endforeach
    </ul>
</body>

</html>
