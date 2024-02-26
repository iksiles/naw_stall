<!DOCTYPE html>
<html>

<head>
    <title>Naw Stall - {{ __('titles.home') }}</title>
    @include('ns.layouts.boot')
    @include('ns.layouts.theme')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script>
    console.log("Locale actual:", "{{ app()->getLocale() }}");
</script>

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
    <h3 class="text-light text-center">{{ __('titles.home') }}</h3>

    <ul class="text-light">
        @foreach($entries as $entry)
            <li>
                <h2>{{ $entry->title }}</h2>
                <p>{{ $entry->summary }}</p>
                <p>Publicado el: {{ $entry->published }}</p>
                <a href="{{ $entry->id }}">{{ __('buttons.link') }}</a>
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
