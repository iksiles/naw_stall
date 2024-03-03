<!DOCTYPE html>
<html>

<head>
    <!-- Título de la página -->
    <title>Naw Stall - {{ __('titles.regis') }}</title>
    <!-- Inclusión de archivos de estilo y scripts -->
    @include('ns.layouts.boot') <!-- Se incluye un archivo de boot -->
    @include('ns.layouts.theme') <!-- Se incluye un archivo de tema -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Se enlaza un archivo de estilos personalizado -->
    <!-- Configuración de la vista del dispositivo -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="bg-dark">
    <!-- PHP para determinar el tipo de formulario (login o registro) -->
    @php
    $formType = isset($formType) ? $formType : 'login';
    @endphp
    <!-- Navegación -->
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-col md:flex-row items-center justify-between mx-auto p-2">
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ url('img/Asset 4.png') }}" class="h-10" alt="NAw STALL Logo" />
            </a>

            <div class="flex flex-col md:flex-row items-center md:order-2 space-y-3 md:space-y-0 md:space-x-3 rtl:space-x-reverse">
                <!-- Enlace al perfil del usuario -->
                <a class="block  m-2 py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                    aria-current="page" href="{{ route('ns.login') }}">{{ __('titles.profile') }}</a>
            </div>

            <div class="items-center justify-between w-full md:w-auto md:order-1" id="navbar-user">
                <!-- Lista de opciones de navegación -->
                <ul class="flex flex-col md:flex-row font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <!-- Enlaces de navegación -->
                    <li>
                        <a href="{{ route('ns.index') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('titles.home') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('ns.news') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('titles.newsest') }}</a>
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

    <!-- Contenido principal -->
    <div class="flex justify-center items-center h-screen bg-blue-200">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <div class="text-center mb-6">
                <!-- Texto para cambiar entre registro y login -->
                <p id="membershipText"
                    class="text-gray-500">{{ $formType === 'registro' ? __('titles.haveyou') : __('titles.areyou') }}</p>
                <!-- Interruptor para cambiar entre registro y login -->
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

            <!-- Formulario de login -->
            <div id="loginForm"
                class="{{ $formType === 'registro' ? 'hidden' : 'block' }}">
                <!-- Título del formulario de login -->
                <h2 class="text-gray-800 text-center text-lg font-semibold">{{ __('titles.login') }}</h2>
                <!-- Formulario de login -->
                <form class="mt-4" enctype="multipart/form-data"
                    method="POST"
                    action="{{ route('ns.login.submit') }}">
                    @csrf
                    <!-- Campo de correo electrónico -->
                    <input class="form-input bg-gray-800 border border-gray-600 text-white rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                        type="email" name="email"
                        placeholder="{{ __('buttons.email') }}">
                    @error('email')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                    <!-- Campo de contraseña -->
                    <input class="form-input bg-gray-800 border border-gray-600 text-white rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 mt-2"
                        type="password" name="password"
                        placeholder="{{ __('buttons.password') }}">
                    @error('password')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                    <!-- Botón de login -->
                    <button
                        class="mt-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">{{ __('buttons.login') }}</button>
                </form>
            </div>

            <!-- Formulario de registro -->
            <div id="registroForm"
                class="{{ $formType === 'login' ? 'hidden' : 'block' }}">
                <!-- Título del formulario de registro -->
                <h2 class="text-gray-800 text-center text-lg font-semibold">{{ __('titles.register') }}</h2>
                <!-- Formulario de registro -->
                <form class="mt-4" enctype="multipart/form-data"
                    method="POST"
                    action="{{ route('ns.register') }}">
                    @csrf
                    <!-- Campo de nombre -->
                    <input class="form-input bg-gray-800 border border-gray-600 text-white rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                        type="text" name="name"
                        placeholder="{{ __('buttons.name') }}"
                        value="{{ old('name') }}">
                    @error('name')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                    <!-- Campo de correo electrónico -->
                    <input class="form-input bg-gray-800 border border-gray-600 text-white rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 mt-2"
                        type="email" name="email"
                        placeholder="{{ __('buttons.email') }}"
                        value="{{ old('email') }}">
                    @error('email')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                    <!-- Campo de contraseña -->
                    <input class="form-input bg-gray-800 border border-gray-600 text-white rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 mt-2"
                        type="password" name="password"
                        placeholder="{{ __('buttons.password') }}">
                    @error('password')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                    <!-- Campo de carga de imagen -->
                    <label
                        class="mt-2 block text-gray-600">{{ __('buttons.profPhot') }}</label>
                    <input class="form-input bg-gray-800 border border-gray-600 text-white rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 mt-2"
                        type="file" name="img">
                    <!-- Botón de registro -->
                    <button
                        class="mt-4 bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">{{ __('buttons.register') }}</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Pie de página -->
    <footer class="bottom-0 w-full">
        <div class="bg-gray-800 text-white text-center py-4">
            <p>&copy; 2024 NAW STALL --->{{ __('titles.footer') }} </p>
        </div>
    </footer>

    <!-- Script para cambiar entre login y registro -->
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
