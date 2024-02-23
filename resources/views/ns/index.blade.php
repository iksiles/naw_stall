<!DOCTYPE html>
<html>

<head>
    <title>Naw Stall - Newsletter</title>
    @include('ns.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
</head>

<body class="bg-gradient-to-r from-purple-500 via-blue-500 to-green-500 min-h-screen">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">

        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="" class="h-8" alt="NAw STALL Logo" />
            </a>

            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

                <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
                </button>

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
                                <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Pricing</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </nav>



    <div class="bg-red-500">
        <h2 class="text-white ">Bienvenido a NAW STALL!</h2>
    </div> 

    <ul class="grid gap-5 grid-cols-2 grid-rows-4">
        @foreach($entries as $entry)
            <li>
                <h2>{{ $entry->title }}</h2>
                <p>{{ $entry->summary }}</p>
                <p>Publicado el: {{ $entry->published }}</p>
                <a href="{{ $entry->id }}">Enlace</a>
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
