@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register - MagtimusPro</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/estilos.css') }}">
</head>
<body>
<main>
    <div class="contenedor__todo">
        <div class="caja__trasera">
            <div class="caja__trasera-login">
                <h3>¿Ya tienes una cuenta?</h3>
                <p>Inicia sesión para entrar en la página</p>
                <button id="btn__iniciar-sesion" onclick="document.querySelector('.formulario__login').style.display='block'; document.querySelector('.formulario__register').style.display='none';">Iniciar Sesión</button>
            </div>
            <div class="caja__trasera-register">
                <h3>¿Aún no tienes una cuenta?</h3>
                <p>Regístrate para que puedas iniciar sesión</p>
                <button id="btn__registrarse" onclick="document.querySelector('.formulario__register').style.display='block'; document.querySelector('.formulario__login').style.display='none';">Regístrarse</button>
            </div>
        </div>

        <div class="contenedor__login-register">
            <!-- Login -->
            <form method="POST" action="{{ route('login') }}" class="formulario__login">
                @csrf
                <h2>Iniciar Sesión</h2>
                <input type="email" placeholder="Correo Electrónico" name="email" value="{{ old('email') }}" required autofocus class="@error('email') is-invalid @enderror">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input type="password" placeholder="Contraseña" name="password" required class="@error('password') is-invalid @enderror">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <button type="submit">Entrar</button>
            </form>

            <!-- Register -->
            <form method="POST" action="{{ route('register') }}" class="formulario__register" style="display:none;">
                @csrf
                <h2>Registrarse</h2>
                <input id="name" type="text" placeholder="Nombre completo" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input id="email" type="email" placeholder="Correo Electrónico" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input id="username" type="text" placeholder="Usuario" name="username" value="{{ old('username') }}" required>
                <input id="password" type="password" placeholder="Contraseña" class="@error('password') is-invalid @enderror" name="password" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input id="password-confirm" type="password" placeholder="Confirmar Contraseña" name="password_confirmation" required>
                <button type="submit">Registrarse</button>
            </form>
        </div>
    </div>
</main>

<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
@endsection
