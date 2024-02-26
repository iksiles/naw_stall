<!DOCTYPE html>
<html>

    <head>
        <title>Naw Stall</title>
        @include('ns.layouts.boot')
        <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
    </head>

    <body class="bg-gradient-to-r from-purple-500 via-blue-500 to-green-500 min-h-screen">
        <nav class="bg-white border-gray-200 dark:bg-gray-900">

            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

                <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ url('img/Asset 4.png') }}" class="h-12" alt="NAw STALL Logo" />
                </a>

                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    @if (Auth::check()) <!-- Verificar si el usuario ha iniciado sesión -->
                        <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-10 h-10 rounded-full" src="{{ url('img/profilePic/ikersiles35-at-gmailcom.jpg') }}" alt="user photo">
                        </button>

                    @else
                    <a class="navbar-brand" href="{{ route('ns.login') }}">Perfil</a>

                    @endif

                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                        
                        <div class="px-4 py-3">

                            <span class="block text-sm text-gray-900 dark:text-white">Username</span>
                            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@gmail.com</span>

                        </div>

                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ajustes</a>
                            </li>

                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                            </li>
                        </ul>

                    </div>

                    <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>

                        <svg class="w-5 h-5" aria-hidden="true" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </svg>

                    </button>

                    </div>

                        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">

                            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                                
                                <li>
                                    <a href="{{ route('ns.index') }}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('ns.news') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">News</a>
                                </li>
                                <li>
                                    <a href="{{ route('ns.wiki') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Wiki</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Forum</a>
                                </li>

                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="bg-red-500 text-center py-4">
            <h2 class="text-white text-3xl font-bold">Bienvenido a NAW STALL!</h2>
        </div>

        <div class="entry-container h-96 overflow-y-auto">
            <ul class="grid gap-5 grid-cols-2 grid-rows-4">
                @foreach($entries as $entry)
                    <li class="entry p-2 bg-white rounded-lg shadow-md m-4">
                        <h2 class="text-lg font-bold mb-1">{{ $entry->title }}</h2>
                        <p class="text-sm text-gray-700">{{ $entry->summary }}</p>
                        <p class="text-xs text-gray-500">Publicado el: {{ $entry->published }}</p>
                        <a href="{{ $entry->id }}" class="text-blue-500 text-xs">Enlace</a>
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

        <div class="flex justify-between items-center h-56 px-4 py-8 bg-gray-200">
            <div class="flex items-center">
                <img src="{{ url('img/Asset 4.png') }}" class="h-16 w-16 mr-4" alt="Imagen Izquierda">
            </div>
            <h2 class="text-xl font-bold">About Us</h2>
            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin varius posuere ligula at elementum. Aliquam et sem ac quam vestibulum tincidunt nec vel justo.</p>
        </div>

    </body>

    <footer class="absolute bottom-0 w-full">
        <div class="bg-gray-800 text-white text-center py-4">
            <p>&copy; 2024gef NAW STALL</p>
        </div>
    </footer>

</html>
