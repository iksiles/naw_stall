<!DOCTYPE html>
<html>

<head>
    <title>Naw Stall - Newsletter</title>
    @include('ns.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">

    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>

</head>

<body class="bg-gradient-to-r from-purple-500 via-blue-500 to-green-500 min-h-screen">
    
    <nav class="bg-red-200 w-full h-px-60">

        <div class="space-x-5 h-13 w-ful p-2">
            <a href="" class="bg-green-800 rounded-t-lg pb-2.5 pt-1.5 px-2">Home</a>
            <a href="" class="bg-blue-300 rounded-lg p-2">News</a>
            <a href="" class="bg-gray-500 rounded-lg p-2">Wiki</a>
            <a href="" class="bg-purple-200 rounded-lg p-2">Forum</a>
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
                            <img src="{{ $link['href'] }}" alt=".">
                        @endif
                    @endforeach
                @endif
            </li>
        @endforeach
    </ul>
</body>

</html>
