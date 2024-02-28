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

<body class="bg-gradient-to-r from-purple-500 via-blue-500 to-green-500 min-h-screen">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex items-center justify-between mx-auto p-2">
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ url('img/Asset 4.png') }}" class="h-10" alt="NAw STALL Logo" />
            </a>

                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="{{ route('ns.index') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('titles.home') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('ns.news') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('titles.newsest') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('ns.wiki') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('titles.wiki') }}</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('titles.forum') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <!-- Campo de búsqueda -->
                    <div class="relative mx-5">
                        <input type="text" class="bg-gray-200 border border-gray-300 rounded-md py-1 px-3 focus:outline-none focus:ring-2 focus:ring-gray-400" placeholder="Buscar...">
                        <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <!-- Icono de búsqueda -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.823-4.822M9 17a8 8 0 100-16 8 8 0 000 16z"/>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <form enctype="multipart/form-data" action="{{ route('ns.logout') }}" method="post">
                        @csrf
                        <button class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" type="submit">{{ __('titles.logout') }}</button>
                    </form>
                </div>
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