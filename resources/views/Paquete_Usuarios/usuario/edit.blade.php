

@extends('layouts.dashboard')

{{-- @section('title', 'Editar') --}}

@section('content')
<div class="container d-flex align-items-center">
    <form action="{{ route('persona.update', [$persona->id]) }}" method="POST" class="m-center bg-white p-5 rounded shadow-lg" style="max-width: 800px;">
        @method('PUT')
        @csrf
        <h2 class="text-center mb-4">Editar usuario</h2>

        <!-- Nombre Completo -->
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 text-md-end">
                <label for="nombre" class="form-label">Nombre Completo</label>
            </div>
            <div class="col-md-9">
                <input name="nombre" type="text" value="{{ $persona->nombre }}" class="form-control" id="nombre" placeholder="Ej: Juan Pérez">
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
                <input name="correo" type="email" value="{{ $persona->correo }}" class="form-control" id="email" placeholder="ejemplo@mail.com">
                @error('email')
                    <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                @enderror
            </div>
        </div>

        {{-- <!-- Contraseña -->
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 text-md-end">
                <label for="password" class="form-label">Contraseña</label>
            </div>
            <div class="col-md-9">
                <input name="contrasena" type="password" class="form-control" id="password" placeholder="Mínimo 8 caracteres" value="{{ 12345678 }}">
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
                <input name="confirmacion_contrasena" type="password" class="form-control" id="password_confirmation" placeholder="Repite tu contraseña" value="{{ 12345678 }}">
            </div>
        </div> --}}

        <!-- Dirección -->
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 text-md-end">
                <label for="direccion" class="form-label">Dirección</label>
            </div>
            <div class="col-md-9">
                <input name="direccion" type="text" value="{{ $persona->direccion }}" class="form-control" id="direccion" placeholder="Ej: Av. Principal #123">
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
                <input name="telefono" type="tel" value="{{ $persona->telefono }}" class="form-control" id="telefono" placeholder="Ej: +51 987654321">
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

                    <option value="cliente" {{ $persona->tipo == 'cliente' ? 'selected' : '' }}>Cliente</option>
                    <option value="usuario" {{ $persona->tipo == 'usuario' ? 'selected' : '' }}>Usuario Interno</option>
                    <option value="proveedor" {{ $persona->tipo == 'proveedor' ? 'selected' : '' }}>Proveedor</option>
                </select>
                @error('tipo')
                    <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                @enderror
            </div>
        </div>

        <!-- Botón de Submit -->
        <div class="row">
            <div class="col-md-9 offset-md-3">
                <button type="submit" class="btn btn-primary w-100 py-2">Actualizar datos</button>
            </div>
        </div>


    </form>
</div>
@endsection




