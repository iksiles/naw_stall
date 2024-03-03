<!DOCTYPE html>
<html>

<head>
    <!-- Configuración de codificación de caracteres y vista del dispositivo -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título de la página -->
    <title>Naw Stall - {{ $msfs->model }}</title>
    <!-- Inclusión de archivos de estilo y scripts -->
    @include('ns.layouts.boot') <!-- Se incluye un archivo de boot -->
    @include('ns.layouts.theme') <!-- Se incluye un archivo de tema -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Se enlaza un archivo de estilos personalizado -->
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
                    
                    <!-- Botón de regreso -->
                    <li>
                        <a class="btn btn-primary" href="{{ back()->getTargetUrl() }}"><---</a>
                    </li>
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
        
             <!-- Contenido izquierdo -->
            <div class="w-full sm:w-1/2 flex flex-col items-center">
                <label class="text-3xl font-bold">{{ $msfs->manufact }}</label>
                <h3 class="text-2xl text-light">{{ $msfs->model }}</h3>
                <img id="portada" src="{{ url('img/plane/'.$msfs->img) }}" alt="img" class="rounded-lg mt-4">
            </div>

            <!-- Contenido derecho -->
            <article class="text-light text-center p-4 w-full sm:w-1/2">
                <div id="containetor" class="container mx-auto bg-white overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <!-- Filas de la tabla con información sobre la aeronave -->
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 p-2"><strong>{{ __('planes.manufacturer') }}</strong></td>
                                <td class="border border-gray-300 p-2">{{ $msfs->manufact }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2"><strong>{{ __('planes.entryservice') }}</strong></td>
                                <td class="border border-gray-300 p-2">{{ $msfs->year }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2"><strong>{{ __('planes.emptyweight') }}</strong></td>
                                <td class="border border-gray-300 p-2">{{ $msfs->weight }}kg</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2"><strong>{{ __('planes.enginetype') }}</strong></td>
                                <td class="border border-gray-300 p-2">{{ $msfs->engineType }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2"><strong>{{ __('planes.enginemanu') }}</strong></td>
                                <td class="border border-gray-300 p-2">{{ $msfs->engineManu }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2"><strong>{{ __('planes.cargocap') }}</strong></td>
                                <td class="border border-gray-300 p-2">{{ $msfs->cargo }}kg</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2"><strong>{{ __('planes.passcap') }}</strong></td>
                                <td class="border border-gray-300 p-2">{{ $msfs->travelNum }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2"><strong>{{ __('planes.fuelmaxcap') }}</strong></td>
                                <td class="border border-gray-300 p-2">{{ $msfs->fuelCap }}l</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2"><strong>{{ __('planes.maxalt') }}</strong></td>
                                <td class="border border-gray-300 p-2">{{ $msfs->maxAlt }}m</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2"><strong>{{ __('planes.maxvel') }}</strong></td>
                                <td class="border border-gray-300 p-2">{{ $msfs->maxVel }}km/h</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2"><strong>{{ __('planes.flyrange') }}</strong></td>
                                <td class="border border-gray-300 p-2">{{ $msfs->flyRange }}km</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2"><strong>{{ __('planes.pdf') }}</strong></td>
                                <td  class="border border-gray-300 p-2">
                                    <a href="{{ url('pdf/'.$msfs->manufact.'_'.$msfs->model.'.pdf') }}">{{ $msfs->manufact.'_'.$msfs->model.'.pdf' }}</a>
                                </td> 
                            </tr>
                        </tbody>
                    </table>
                </div>
            </article>
        </div>

        <footer class="bottom-0 w-full">
        <div class="bg-gray-800 text-white text-center py-4">
            <!-- Pie de página -->
            <p>&copy; 2024 NAW STALL --->{{ __('titles.footer') }} </p>
        </div>
    </footer>
    
    <!-- Script para mostrar/ocultar el menú de usuario -->
    <script>
        document.getElementById('user-menu-button').addEventListener('click', function() {
            var dropdownMenu = document.getElementById('user-dropdown');
            dropdownMenu.classList.toggle('hidden');
        });
    </script>

</body>

</html>