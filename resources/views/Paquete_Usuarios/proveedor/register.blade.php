

@extends('layouts.app')

{{-- @section('title', 'Registro') --}}

@section('content')
<div class="container d-flex min-vh-100 align-items-center">
    <form action="{{ route('proveedor.verify') }}" method="POST" class="m-auto bg-white p-5 rounded shadow-lg" style="max-width: 800px;">
        @csrf
        <h2 class="text-center mb-4">Registro de proveedor</h2>

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

        <!-- fecha registro -->
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 text-md-end">
                <label for="registro" class="form-label">Fecha registro</label>
            </div>
            <div class="col-md-9">
                <input name="registro" type="date" value="{{ old('registro') }}" class="form-control" id="registro" placeholder="YYYY-MM-DD">
                @error('registro')
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
                    <option value="cliente" {{ old('tipo') == 'cliente' ? 'selected' : '' }}>Cliente</option>
                    <option value="usuario" {{ old('tipo') == 'usuario' ? 'selected' : '' }}>Usuario Interno</option>
                    <option value="proveedor" {{ old('tipo') == 'proveedor' ? 'selected' : '' }}>Proveedor</option>
                </select>
                @error('tipo')
                    <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                @enderror
            </div>
        </div>

        <!-- Botón de Submit -->
        <div class="row">
            <div class="col-md-9 offset-md-3">
                <button type="submit" class="btn btn-primary w-100 py-2">Registrar</button>
            </div>
        </div>


    </form>
</div>
@endsection


