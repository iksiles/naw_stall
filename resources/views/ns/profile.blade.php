<!DOCTYPE html>
<html>

<head>
    <title>Naw Stall - {{ __('titles.profile') }}</title>
    @include('ns.layouts.boot')
    @include('ns.layouts.theme')

    <script>
    console.log("Locale actual:", "{{ app()->getLocale() }}");
</script>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('ns.index') }}">{{ __('titles.home') }}</a>
            <a class="navbar-brand" href="{{ route('ns.wiki') }}">{{ __('titles.wiki') }}</a>
            <a class="navbar-brand" href="#">{{ __('titles.forum') }}</a>
            <form enctype="multipart/form-data" action="{{ route('ns.logout') }}" method="post">
                @csrf
                <button class="navbar-brand form-control" type="submit">{{ __('titles.logout') }}</button>
            </form>
        </div>
    </nav>

    <article class="text-light text-center">
        <h2>{{ __('titles.welprof') }}</h2>
        <img src="{{ url('img/profilePic/'.Auth::user()->img) }}" alt="Foto de perfil" style="width: 90px; height: 90px; border-radius: 50%;">
        <h3>{{ Auth::user()->name }}</h3>
    </article>

    <article>
    <form id="profileForm" action="{{ route('ns.profile.save') }}" method="POST">
        @csrf
        <input type="hidden" name="form_type" value="profile">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            {{ __('buttons.theme') }}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="theme" id="theme1" value="theme1"
                        {{ session('theme') == 'theme1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="theme1">
                    {{ __('buttons.theme1') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="theme" id="theme2" value="theme2"
                        {{ session('theme') == 'theme2' ? 'checked' : '' }}>
                    <label class="form-check-label" for="theme2">
                    {{ __('buttons.theme2') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="theme" id="theme3" value="theme3"
                        {{ session('theme') == 'theme3' ? 'checked' : '' }}>
                    <label class="form-check-label" for="theme3">
                    {{ __('buttons.theme3') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="theme" id="theme4" value="theme4"
                        {{ session('theme') == 'theme4' ? 'checked' : '' }}>
                    <label class="form-check-label" for="theme4">
                    {{ __('buttons.theme4') }}
                    </label>
                </div>
        </div>
    </div>
    <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="languageDropdownButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{ __('buttons.lang') }}
    </button>
    <div class="dropdown-menu" aria-labelledby="languageDropdownButton">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="language" id="spanish" value="es" {{ session('locale') == 'es' ? 'checked' : '' }}>
                <label class="form-check-label" for="spanish">
                    Español
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="language" id="english" value="en" {{ session('locale') == 'en' ? 'checked' : '' }}>
                <label class="form-check-label" for="english">
                    English
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="language" id="euskera" value="eu" {{ session('locale') == 'eu' ? 'checked' : '' }}>
                <label class="form-check-label" for="euskera">
                    Euskera
                </label>
            </div>
        </div>
    </div>
        <!-- Otros campos de perfil -->
        <button id="guardarPerfilBtn" type="submit" class="btn btn-primary">{{ __('buttons.profile') }}</button>
    </form>
</article>

</body>

</html>