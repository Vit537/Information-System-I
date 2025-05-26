{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body> --}}
{{-- <h1>hello henry como estas </h1> --}}
{{-- @extends('layouts.app') <!-- Hereda de app.blade.php -->
@section('content')
<div class="container d-flex">
    <form action="" method="POST" class="m-auto bg-white p-5 rounded-sm shadow-lg w-form">
        @csrf
        <h2 class="text-center">Register form</h2>
        <div class="form-group">
            <label for="ExampleInputEmail1">Email Address</label>
            <input name="email" type="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            @error('email')
                <small class="text-danger mt-1">
                    <strong>{{$message}}</strong>
                </small>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1"  placeholder="Password">
            @error('password')
            <small class="text-danger mt-1">
                <strong>{{$message}}</strong>
            </small>
        @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password Confirmation</label>
            <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1"  placeholder="Password">
            @error('password_confirmation')
            <small class="text-danger mt-1">
                <strong>{{$message}}</strong>
            </small>
        @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-block">Registrarme</button>
        <div class="mt-3 text-center">
            <a href="{{ route('login')}}">Iniciar seccion</a>
        </div>
    </form>
</div>


@endsection --}}

@extends('layouts.index')

{{-- @section('title', 'Registro') --}}

@section('content')

{{-- min-h-screen --}}

    <div
        class=" flex items-center justify-center">
        <form action="{{ route('register.verify') }}" method="POST"
            class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md space-y-6">
            @csrf

            <h2 class="text-2xl font-bold text-center text-gray-800">Registrarse</h2>

            <!-- Email -->
            {{-- <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" name="correo" id="email" value="{{ old('email') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="ejemplo@mail.com" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contraseña -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name="contrasena" id="password"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Mínimo 8 caracteres" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div> --}}



             <!-- Nombre Completo -->
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 text-md-end">
                <label for="nombre" class="form-label">Nombre Completo</label>
            </div>
            <div class="col-md-9">
                <input name="nombre" type="text" value="{{ old('nombre') }}" class="form-control" id="nombre" placeholder="Ej: Juan Pérez">
                @error('nombre')
                    <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                @enderror
            </div>
        </div>

        <!-- Email -->
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 text-md-end">
                <label for="email" class="form-label">Correo Electrónico</label>
            </div>
            <div class="col-md-9">
                <input name="correo" type="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="ejemplo@mail.com">
                @error('email')
                    <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                @enderror
            </div>
        </div>

        <!-- Contraseña -->
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 text-md-end">
                <label for="password" class="form-label">Contraseña</label>
            </div>
            <div class="col-md-9">
                <input name="contrasena" type="password" class="form-control" id="password" placeholder="Mínimo 8 caracteres">
                @error('password')
                    <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                @enderror
            </div>
        </div>

        <!-- Confirmar Contraseña -->
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 text-md-end">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            </div>
            <div class="col-md-9">
                <input name="confirmacion_contrasena" type="password" class="form-control" id="password_confirmation" placeholder="Repite tu contraseña">
            </div>
        </div>

        <!-- Dirección -->
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 text-md-end">
                <label for="direccion" class="form-label">Dirección</label>
            </div>
            <div class="col-md-9">
                <input name="direccion" type="text" value="{{ old('direccion') }}" class="form-control" id="direccion" placeholder="Ej: Av. Principal #123">
                @error('direccion')
                    <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                @enderror
            </div>
        </div>

        <!-- Teléfono -->
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 text-md-end">
                <label for="telefono" class="form-label">Teléfono</label>
            </div>
            <div class="col-md-9">
                <input name="telefono" type="tel" value="{{ old('telefono') }}" class="form-control" id="telefono" placeholder="Ej: +51 987654321">
                @error('telefono')
                    <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                @enderror
            </div>
        </div>



            <!-- Tipo de Usuario (Select) -->
            <div class="row mb-4 align-items-center">
                <div class="col-md-3 text-md-end">
                    <label for="tipo" class="form-label">Tipo de Usuario</label>
                </div>
                <div class="col-md-9">
                    <select name="tipo" class="form-select" id="tipo">
                        <option value="" disabled selected>Selecciona un tipo</option>
                        <option value="empleado" {{ old('tipo') == 'empleado' ? 'selected' : '' }}>Empleado</option>
                        <option value="administrador" {{ old('tipo') == 'administrador' ? 'selected' : '' }}>Administrador
                        </option>
                        {{-- <option value="proveedor" {{ old('tipo') == 'proveedor' ? 'selected' : '' }}>Proveedor</option> --}}
                            </select>
                @error('tipo')
                    <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                @enderror
            </div>
        </div>



            <!-- Botón de Enviar -->
            <div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition">
                    Registrar
                </button>
            </div>
        </form>
    </div>
@endsection




{{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html> --}}
