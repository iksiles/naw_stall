<!DOCTYPE html>
<html>

<head>
    <title>Naw Stall - Profile</title>
    @include('ns.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('ns.index') }}">Index</a>
            <a class="navbar-brand" href="#">Wiki</a>
            <a class="navbar-brand" href="#">Foro</a>
            <form enctype="multipart/form-data" action="{{ route('ns.logout') }}" method="post">
                @csrf
                <button class="navbar-brand form-control" type="submit">Cerrar sesión</button>
            </form>
        </div>
    </nav>

    <article class="text-light text-center">
        <h2>Tu perfil! Bienvenido piloto</h2>
        <img src="{{ url('img/profilePic/'.Auth::user()->img) }}" alt="Foto de perfil" style="width: 90px; height: 90px; border-radius: 50%;">
        <h3>{{ Auth::user()->name }}</h3>
    </article>


    
</body>

</html>