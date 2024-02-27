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

    <div class="text-center mt-3">
        <p id="membershipText" class="text-light">{{ $formType === 'registro' ? __('titles.haveyou') : __('titles.areyou') }}</p>
        <label class="switch">
            <input type="checkbox" id="toggleForm" {{ $formType === 'registro' ? 'checked' : '' }}>
            <span class="slider round"></span>
        </label>
    </div>

    <div id="loginForm" style="{{ $formType === 'registro' ? 'display:none' : '' }}">
        <h2 class="text-light text-center">{{ __('titles.login') }}</h2>
        <form enctype="multipart/form-data" method ="POST" action="{{ route('ns.login.submit') }}">
            @csrf
            <input class="form-control" type="email" name="email" placeholder="{{ __('buttons.email') }}">
            @error('email')
            <p class="error-message">{{ $message }}</p>
            @enderror
            <input class="form-control" type="password" name="password" placeholder="{{ __('buttons.password') }}">
            @error('password')
            <p class="error-message">{{ $message }}</p>
            @enderror
            <button type="submit">{{ __('buttons.login') }}</button>
        </form>
    </div>

    <div id="registroForm" style="{{ $formType === 'login' ? 'display:none' : '' }}">
        <h2 class="text-light text-center">{{ __('titles.register') }}</h2>
        <form enctype="multipart/form-data" method ="POST" action="{{ route('ns.register') }}">
            @csrf
            <input class="form-control" type="text" name="name" placeholder="{{ __('buttons.name') }}" value="{{ old('name') }}">
            @error('name')
            <p class="error-message">{{ $message }}</p>
            @enderror
            <input class="form-control" type="email" name="email" placeholder="{{ __('buttons.email') }}" value="{{ old('email') }}">
            @error('email')
            <p class="error-message">{{ $message }}</p>
            @enderror
            <input class="form-control" type="password" name="password" placeholder="{{ __('buttons.password') }}">
            @error('password')
            <p class="error-message">{{ $message }}</p>
            @enderror
            <label class="form-label text-light">{{ __('buttons.profPhot') }}</label>
            <input class="form-control" type="file" name="img">
            <button type="submit">{{ __('buttons.register') }}</button>
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