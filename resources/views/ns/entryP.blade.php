<!DOCTYPE html>
<html>

<head>
    <!-- Título de la página -->
    <title>Naw Stall - {{ $plane->model }}</title>
    <!-- Inclusión de archivos de estilo y scripts -->
    @include('ns.layouts.boot') <!-- Se incluye un archivo de boot -->
    @include('ns.layouts.theme') <!-- Se incluye un archivo de tema -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Se enlaza un archivo de estilos personalizado -->
    <!-- Configuración de la vista del dispositivo -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="bg-gradient-to-r from-purple-500 via-blue-500 to-green-500 min-h-screen">
    <!-- Navegación -->
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <!-- Contenedor de la barra de navegación -->
        <div class="max-w-screen-xl flex flex-col md:flex-row items-center justify-between mx-auto p-2">
            <!-- Logo de Naw Stall -->
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ url('img/Asset 4.png') }}" class="h-10" alt="NAw STALL Logo" />
            </a>

            <!-- Sección de usuario -->
            <div class="flex flex-col md:flex-row items-center md:order-2 space-y-3 md:space-y-0 md:space-x-3 rtl:space-x-reverse">
                <!-- Botón para mostrar el menú en dispositivos móviles -->
                <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">{{ __('buttons.mainmenu') }}</span>
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </button>

                <!-- Verificación de inicio de sesión -->
                @if (Auth::check())
                <!-- Botón de usuario logueado -->
                <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">{{ __('buttons.usermenu') }}</span>
                    <img class="w-8 h-8 rounded-full" src="{{ url('img/profilePic/'.Auth::user()->img) }}" alt="user photo">
                </button>

                <!-- Menú desplegable de usuario -->
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
                <!-- Enlace de inicio de sesión -->
                <a class="navbar-brand" href="{{ route('ns.login') }}">{{ __('titles.profile') }}</a>
                @endif
            </div>

            <!-- Opciones de navegación -->
            <div class="items-center justify-between w-full md:w-auto md:order-1" id="navbar-user">
                <!-- Lista de opciones de navegación -->
                <ul class="flex flex-col md:flex-row font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <!-- Enlaces de navegación -->
                    <li>
                        <a href="{{ route('ns.index') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('titles.home') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('ns.news') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('titles.newsest') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('ns.wiki') }}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">{{ __('titles.wiki') }}</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('titles.forum') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="flex flex-col md:flex-row  p-4">

        <!-- Div que contiene la información de la aeronave -->
        <div class="w-full md:w-1/2 flex flex-col items-center">
            <label class="text-3xl font-bold">{{ $plane->manufact }}</label>
            <h3 class="text-2xl text-light">{{ $plane->model }}</h3>
            <img id="portada" src="{{ url('img/plane/'.$plane->img) }}" alt="img" class="rounded-lg mt-4">
        </div>

        <!-- Article que contiene la descripción de la aeronave -->
        <article class="text-light text-center p-4 flex-1">
            <div class="container mx-auto">

                <div class="flex flex-col justify-between h-full">

                    <div class="mx-10 mt-16 bg-red-50 flex justify-center items-center rounded-lg">
                        <div class="flex flex-row justify-center items-center">
                            <!-- Tabla -->
                            <div class="w-1/2 p-2">
                                <table class="table-auto border border-gray-500">
                                    <!-- Filas de la tabla -->
                                    <tr>
                                        <td class="border border-gray-500 px-4 py-2"><strong>{{ __('planes.entryservice') }}</strong></td>
                                        <td class="border border-gray-500 px-4 py-2">{{ $plane->year }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-500 px-4 py-2"><strong>{{ __('planes.emptyweight') }}</strong></td>
                                        <td class="border border-gray-500 px-4 py-2">{{ $plane->weight }} Kg</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-500 px-4 py-2" colspan="2"><strong>{{ __('planes.variants') }}</strong></td>
                                    </tr>
                                    <!-- Iteración sobre las variantes -->
                                    @foreach ($msfs as $vars)
                                    <tr>
                                        <td class="border border-gray-500 px-4 py-2" colspan="2">
                                            <a href="{{ route('ns.entryM', $vars->id) }}" class="text-blue-500 italic">{{ $vars->manufact }} {{ $vars->model }}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>

                            <!-- Imagen -->
                            <div class="ml-4 flex justify-center items-center">
                                <img src="{{ url('img/manufacturer/'.$plane->manufact.'.png') }}" alt="" class="w-1/2" />
                            </div>
                        </div>
                    </div>

                    <!-- Descripción de la aeronave -->
                    <div class="mx-auto mt-8 max-w-lg">
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <p class="text-center">
                                Aquí puedes agregar tu descripción sobre la aeronave.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </article>

    </div>

    <!-- Pie de página -->
    <footer class="bottom-0 w-full">
        <div class="bg-gray-800 text-white text-center py-4">
            <p>&copy; 2024 NAW STALL --->{{ __('titles.footer') }} </p>
        </div>
    </footer>
</body>

    <!-- Script para mostrar/ocultar el menú de usuario -->
    <script>
        document.getElementById('user-menu-button').addEventListener('click', function() {
            var dropdownMenu = document.getElementById('user-dropdown');
            dropdownMenu.classList.toggle('hidden');
        });
    </script>

</html>
