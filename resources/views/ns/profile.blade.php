<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Naw Stall - {{ __('titles.profile') }}</title>
        <!-- Incluye el CDN de Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>

    <body class="bg-blue-900 min-h-screen">

        <!-- Navigation -->
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-col md:flex-row items-center justify-between mx-auto p-2">
                <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ url('img/Asset 4.png') }}" class="h-10" alt="NAw STALL Logo" />
                </a>

                <div class="items-center justify-between w-full md:w-auto md:order-1" id="navbar-user">
                    <ul class="flex flex-col md:flex-row font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">

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

                        <li>
                            <form enctype="multipart/form-data" action="{{ route('ns.logout') }}" method="post">
                                @csrf
                                <button class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" type="submit">{{ __('titles.logout') }}</button>
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="flex flex-col items-center justify-center md:w-3/6 mx-auto my-20 p-8 bg-white rounded-lg shadow-lg">
            <div class="text-center flex flex-col items-center">
                <h2 class="text-gray-900 text-3xl font-bold">{{ __('titles.welprof') }}</h2>
                <img src="{{ url('img/profilePic/'.Auth::user()->img) }}" alt="Foto de perfil" style="width: 90px; height: 90px; border-radius: 50%;" class="my-4">
                <h3 class="text-gray-900 text-3xl font-bold">{{ Auth::user()->name }}</h3>
            </div>

            <div class="mt-5 bg-blue-900 rounded-lg shadow-lg p-5 text-white">
                <form id="profileForm" action="{{ route('ns.profile.save') }}" method="POST" class="grid gap-x-16 grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 px-5">
                    @csrf
                    <input type="hidden" name="form_type" value="profile">

                    <div class="dropdown">

                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('buttons.theme') }}
                        </button>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="theme" id="theme1" value="theme1" {{ session('theme') == 'theme1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="theme1">
                                    {{ __('buttons.theme1') }}
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="theme" id="theme2" value="theme2" {{ session('theme') == 'theme2' ? 'checked' : '' }}>
                                <label class="form-check-label" for="theme2">
                                    {{ __('buttons.theme2') }}
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="theme" id="theme3" value="theme3"{{ session('theme') == 'theme3' ? 'checked' : '' }}>
                                <label class="form-check-label" for="theme3">
                                    {{ __('buttons.theme3') }}
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="theme" id="theme4" value="theme4" {{ session('theme') == 'theme4' ? 'checked' : '' }}>
                                <label class="form-check-label" for="theme4">
                                    {{ __('buttons.theme4') }}
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="dropdown mt-2">

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
                    <button id="guardarPerfilBtn" type="submit" class="btn btn-primary mt-2 bg-gray-50 font-semibold text-gray-900 px-3 py-2 rounded-lg">{{ __('buttons.profile') }}</button>
                </form>
            </div>
        </div>

    </body>

</html>
