<!DOCTYPE html>
<html>

    <head>
        <title>Naw Stall - {{ __('titles.regis') }}</title>
        @include('ns.layouts.boot')
        @include('ns.layouts.theme')
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body class="bg-dark">
        @php
        $formType = isset($formType) ? $formType : 'login';
        @endphp
        <!-- Navegación -->
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex items-center justify-between mx-auto p-2">
                <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ url('img/Asset 4.png') }}" class="h-10" alt="NAw STALL Logo" />
                </a>

                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <!-- Campo de búsqueda -->
                    <div class="relative mx-5">
                        <input type="text"
                            class="bg-gray-200 border border-gray-300 rounded-md py-1 px-3 focus:outline-none focus:ring-2 focus:ring-gray-400"
                            placeholder="Buscar...">
                        <span
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <!-- Icono de búsqueda -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-4.823-4.822M9 17a8 8 0 100-16 8 8 0 000 16z" />
                            </svg>
                        </span>
                    </div>

                    @if (Auth::check()) <!-- Verificar si el usuario ha iniciado sesión -->
                    <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300"
                        id="user-menu-button" aria-expanded="false"
                        data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full"
                            src="{{ url('img/profilePic/ikersiles35-at-gmailcom.jpg') }}"
                            alt="user photo">
                    </button>

                    <!-- Dropdown menu -->
                    <div
                        class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="user-dropdown">
                        <div class="px-4 py-3">
                            <span
                                class="block text-sm text-gray-900 dark:text-white">Username</span>
                            <span
                                class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@gmail.com</span>
                        </div>

                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ajustes</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign
                                    out</a>
                            </li>
                        </ul>
                    </div>
                    @else
                    <a class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                        aria-current="page" href="{{ route('ns.login') }}">{{ __('titles.profile') }}</a>
                    @endif

                    <button data-collapse-toggle="navbar-user"
                        type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-user" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </button>
                </div>

                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"id="navbar-user">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="{{ route('ns.index') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('titles.home') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('ns.news') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">News</a>
                        </li>
                        <li>
                            <a href="{{ route('ns.wiki') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('titles.wiki') }}</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('titles.forum') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="flex justify-center items-center h-screen bg-blue-200">
            <div class="bg-white p-8 rounded-lg shadow-md">
                <div class="text-center mb-6">
                    <p id="membershipText"
                        class="text-gray-500">{{ $formType === 'registro' ? __('titles.haveyou') : __('titles.areyou') }}</p>
                    <label for="toggleForm"
                        class="inline-flex items-center cursor-pointer mt-2">
                        <input type="checkbox" id="toggleForm"
                            class="hidden"
                            {{ $formType === 'registro' ? 'checked' : '' }}>
                        <span
                            class="w-12 h-6 bg-gray-300 rounded-full shadow-inner"></span>
                        <span
                            class="slider h-6 w-6 rounded-full bg-white shadow-md absolute transition-transform duration-300 ease-in-out"
                            :class="{ 'translate-x-6': formType === 'registro' }"></span>
                    </label>
                </div>

                <div id="loginForm"
                    class="{{ $formType === 'registro' ? 'hidden' : 'block' }}">
                    <h2 class="text-gray-800 text-center text-lg font-semibold">{{ __('titles.login') }}</h2>
                    <form class="mt-4" enctype="multipart/form-data"
                        method="POST"
                        action="{{ route('ns.login.submit') }}">
                        @csrf
                        <input class="form-input bg-gray-800 border border-gray-600 text-white rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                            type="email" name="email"
                            placeholder="{{ __('buttons.email') }}">
                        @error('email')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                        <input class="form-input bg-gray-800 border border-gray-600 text-white rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 mt-2"
                            type="password" name="password"
                            placeholder="{{ __('buttons.password') }}">
                        @error('password')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                        <button
                            class="mt-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">{{ __('buttons.login') }}</button>
                    </form>
                </div>

                <div id="registroForm"
                    class="{{ $formType === 'login' ? 'hidden' : 'block' }}">
                    <h2 class="text-gray-800 text-center text-lg font-semibold">{{ __('titles.register') }}</h2>
                    <form class="mt-4" enctype="multipart/form-data"
                        method="POST"
                        action="{{ route('ns.register') }}">
                        @csrf
                        <input class="form-input bg-gray-800 border border-gray-600 text-white rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                            type="text" name="name"
                            placeholder="{{ __('buttons.name') }}"
                            value="{{ old('name') }}">
                        @error('name')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                        <input class="form-input bg-gray-800 border border-gray-600 text-white rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 mt-2"
                            type="email" name="email"
                            placeholder="{{ __('buttons.email') }}"
                            value="{{ old('email') }}">
                        @error('email')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                        <input class="form-input bg-gray-800 border border-gray-600 text-white rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 mt-2"
                            type="password" name="password"
                            placeholder="{{ __('buttons.password') }}">
                        @error('password')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                        <label
                            class="mt-2 block text-gray-600">{{ __('buttons.profPhot') }}</label>
                        <input class="form-input bg-gray-800 border border-gray-600 text-white rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 mt-2"
                            type="file" name="img">
                        <button
                            class="mt-4 bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">{{ __('buttons.register') }}</button>
                    </form>
                </div>
            </div>
        </div>

        <footer class="bottom-0 w-full">
            <div class="bg-gray-800 text-white text-center py-4">
                <p>&copy; 2024 NAW STALL --->Made By @Syfreia And @Yanqui </p>
            </div>
        </footer>

        <script>
            document.getElementById('toggleForm').addEventListener('change',
                function () {
                    var loginForm = document
                        .getElementById('loginForm');
                    var registroForm = document
                        .getElementById('registroForm');
                    var membershipText = document
                        .getElementById('membershipText');

                    if (this.checked) {
                        loginForm.style.display = 'none';
                        registroForm.style.display = 'block';
                        membershipText.innerText = '{{ __('titles.haveyou') }}';
                    } else {
                        loginForm.style.display = 'block';
                        registroForm.style.display = 'none';
                        membershipText.innerText = '{{ __('titles.areyou') }}';
                    }
                });
        </script>
    </body>

</html>
