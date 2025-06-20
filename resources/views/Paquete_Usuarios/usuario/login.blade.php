{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body> --}}
{{-- @extends('layouts.app') <!-- Hereda de app.blade.php -->
@section('content')

    {{-- <h1>hello henry como estas </h1>
    <div class="container d-flex">
        <form action="{{ route('login.verify') }}" method="POST"
            class="m-auto bg-white p-5 rounded-sm shadow-lg w-form">
            @csrf
            <h2 class="text-center">Login form</h2>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <small>{{ session('success') }}</small>
                    <button type="close" class="close" data-dismiss="alert" arial-label="close">
                        <span arian-hidden="true">&times;</span>
                    </button>

                </div>
            @endif

            @error('invalid_Credentials')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <small>{{ $message }}</small>
                    <button type="close" class="close" data-dismiss="alert" arial-label="close">
                        <span arian-hidden="true">&times;</span>
                    </button>

                </div>
            @enderror
            <div class="form-group">
                <label for="ExampleInputEmail1">Enter Email</label>
                <input name="email" type="email" value="{{ old('email') }}" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                @error('email')
                    <small class="text-danger mt-1">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Password">
                @error('password')
                    <small class="text-danger mt-1">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>

            <div class="mt-3 text-center">
                <a href="{{ route('register') }}">Registrarme</a>
            </div>
        </form>
    </div>

    @endsection --}}


{{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

</body>

</html> --}}


@extends('layouts.index')

{{-- @section('title', 'Registro') --}}

@section('content')
    {{-- <div class="container d-flex min-vh-100 align-items-center">
    <form action="{{ route('login.verify') }}" method="POST" class="m-auto bg-white p-5 rounded shadow-lg" style="max-width: 800px;">
        @csrf
        <h2 class="text-center mb-4">Iniciar sesion de Usuario</h2>

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


        <!-- Botón de Submit -->
        <div class="row">
            <div class="col-md-9 offset-md-3">
                <button type="submit" class="btn btn-primary w-100 py-2">Iniciar sesion</button>
            </div>
        </div>


    </form>
</div> --}}
    {{-- <livewire:DarkModeToggle/> --}}
    <div class="">
        <div class="flex items-center justify-center">
            {{-- class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-300 via-slate-600 to-slate-900 px-4"> --}}

            <form action="{{ route('login.verify') }}" method="POST"
                class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md space-y-6">
                @csrf
                @if (session('success'))
                    <x-flash-message :message="session('success')" type="success" />
                @endif
                 @if (session('status'))
                    <x-flash-message :message="session('status')" type="status" />
                @endif
                <h2 class="text-2xl font-bold text-center text-gray-800">Iniciar sesión</h2>

                <!-- Email -->
                <div>
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
                </div>

                <!-- Botón de Enviar -->
                <div>
                    <button type="submit"
                        class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition">
                        Iniciar sesión
                    </button>

                </div>


                <div class=" flex justify-center">
                    <a class="hover:bg-slate-400 px-2 py-1 rounded-xl" href="{{ route('password.request') }}">Olvido su
                        contrasena?</a>
                </div>

            </form>


        </div>
        {{-- <div class="bg-green-700">
                <div class="bg-white flex flex-col md:flex-row gap-4">
                    <h2>Recuperar Contraseña</h2>

                    @if (session('status'))
                        <div>{{ session('status') }}</div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="bg-green-800">
                        @csrf
                        <div>
                            <label for="email">Correo electrónico</label>
                            <input id="email" type="email" name="correo" required>
                        </div>

                        <button type="submit">Enviar enlace de recuperación</button>
                    </form>
                </div>

            </div> --}}
    </div>
@endsection
