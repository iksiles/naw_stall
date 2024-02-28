<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Naw Stall - {{ __('titles.newsletter') }}</title>
        @include('ns.layouts.boot')
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    </head>

    <body class="bg-gradient-to-r from-purple-500 via-blue-500 to-green-500 min-h-screen">
        <!-- Navegación -->
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex items-center justify-between mx-auto p-2">
                <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ url('img/Asset 4.png') }}" class="h-10" alt="NAw STALL Logo" />
                </a>

                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <!-- Campo de búsqueda -->
                    <div class="relative mx-5">
                        <input type="text" class="bg-gray-200 border border-gray-300 rounded-md py-1 px-3 focus:outline-none focus:ring-2 focus:ring-gray-400" placeholder="Buscar...">
                        <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <!-- Icono de búsqueda -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.823-4.822M9 17a8 8 0 100-16 8 8 0 000 16z" />
                            </svg>
                        </span>
                    </div>

                    @if (Auth::check()) <!-- Verificar si el usuario ha iniciado sesión -->
                    <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="sr-only">{{ __('buttons.usermenu') }}</span>
                        <img class="w-8 h-8 rounded-full" src="{{ url('img/profilePic/'.Auth::user()->img) }}" alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                        </div>

                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="{{ route('ns.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 text-center">{{ __('buttons.settings') }}</a>
                            </li>
                            <li>
                                <form enctype="multipart/form-data" action="{{ route('ns.logout') }}" method="post">
                                    @csrf
                                    <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full" type="submit">{{ __('titles.logout') }}</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                    <a class="navbar-brand" href="{{ route('ns.login') }}">{{ __('titles.profile') }}</a>
                    @endif



                    <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                        <span class="sr-only">{{ __('buttons.mainmenu') }}</span>
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </button>
                </div>

                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="{{ route('ns.index') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('titles.home') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('ns.news') }}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">{{ __('titles.newsest') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('ns.wiki') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('titles.wiki') }}</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('titles.forum') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="bg-red-500 text-center py-2">
            <h2 class="text-white text-3xl font-bold">{{ __('titles.news') }}</h2>
        </div>

        <div class="entry-container overflow-y-auto my-9 mx-4 sm:mx-auto max-w-screen-2xl" style="height: auto">
            <ul class="grid gap-1 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach($entries as $entry)
                <li class="entry p-2 bg-white rounded-lg shadow-md m-4">
                    <h2 class="text-lg font-bold mb-1">{{ $entry->title }}</h2>
                    <div class="h-40 sm:h-32 md:h-24 overflow-y-auto custom-scrollbar">
                        <p class="text-sm text-gray-700">{{ $entry->summary }}</p>
                    </div>
                    <p class="text-xs text-gray-500">Publicado el: {{ $entry->published }}</p>
                    <a href="{{ $entry->id }}" class="text-blue-500 text-xs">{{ __('titles.link') }}</a>
                    @if(isset($entry->link))
                    @foreach($entry->link as $link)
                    @if(isset($link['href']))
                    <img src="{{ $link['href'] }}" alt="" class="mt-2">
                    @endif
                    @endforeach
                    @endif
                </li>
                @endforeach
            </ul>
        </div>

        <footer class="bottom-0 w-full">
            <div class="bg-gray-800 text-white text-center py-4">
                <p>&copy; 2024 NAW STALL --->{{ __('titles.footer') }} </p>
            </div>
        </footer>

    </body>
    <script>
            document.getElementById('user-menu-button').addEventListener('click', function() {
                var dropdownMenu = document.getElementById('user-dropdown');
                dropdownMenu.classList.toggle('hidden');
            });
        </script>
</html>
