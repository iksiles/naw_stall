<!DOCTYPE html>
<html>

<head>
    <title>Naw Stall - Register or Login</title>
    @include('ns.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body class="bg-dark">
    @php
        $formType = isset($formType) ? $formType : 'login';
    @endphp

    <div class="text-center mt-3">
        <p id="membershipText" class="text-light">{{ $formType === 'registro' ? '¿Ya tienes una cuenta?' : '¿No eres miembro?' }}</p>
        <label class="switch">
            <input type="checkbox" id="toggleForm" {{ $formType === 'registro' ? 'checked' : '' }}>
            <span class="slider round"></span>
        </label>
    </div>

    <div id="loginForm" style="{{ $formType === 'registro' ? 'display:none' : '' }}">
        <h2 class="text-light text-center">Iniciar sesión</h2>
        <form enctype="multipart/form-data" method ="POST" action="{{ route('ns.login.submit') }}">
            @csrf
            <input type="email" name="email" placeholder="Correo electrónico">
            <input type="password" name="password" placeholder="Contraseña">
            <button type="submit">Iniciar sesión</button>
        </form>
    </div>

    <div id="registroForm" style="{{ $formType === 'login' ? 'display:none' : '' }}">
        <h2 class="text-light text-center">Registrarse</h2>
        <form enctype="multipart/form-data" method ="POST" action="{{ route('ns.register') }}">
            @csrf
            <input type="text" name="name" placeholder="Nombre">
            <input type="email" name="email" placeholder="Correo electrónico">
            <input type="password" name="password" placeholder="Contraseña">
            <input class="form-control" type="file" name="img" placeholder="Imagen">
            <button type="submit">Registrarse</button>
        </form>
    </div>

    <script>
        document.getElementById('toggleForm').addEventListener('change', function() {
            var loginForm = document.getElementById('loginForm');
            var registroForm = document.getElementById('registroForm');
            var membershipText = document.getElementById('membershipText');

            if (this.checked) {
                loginForm.style.display = 'none';
                registroForm.style.display = 'block';
                membershipText.innerText = '¿Ya tienes una cuenta?';
            } else {
                loginForm.style.display = 'block';
                registroForm.style.display = 'none';
                membershipText.innerText = '¿No eres miembro?';
            }
        });
    </script>
</body>

</html>