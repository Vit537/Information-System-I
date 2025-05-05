

@extends('layouts.app')

{{-- @section('title', 'Registro') --}}

@section('content')
<div class="container d-flex min-vh-100 align-items-center">
    <form action="{{ route('verificar.prod') }}" method="POST" class="m-auto bg-white p-5 rounded shadow-lg" style="max-width: 800px;">
        @csrf
        <h2 class="text-center mb-4">Registro de producto</h2>

        <!-- Nombre Completo -->
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 text-md-end">
                <label for="nombre" class="form-label">Nombre </label>
            </div>
            <div class="col-md-9">
                <input name="nombre" type="text" value="{{ old('nombre') }}" class="form-control" id="nombre" placeholder="Ej: foco">
                @error('nombre')
                    <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                @enderror
            </div>
        </div>




        <!-- descripcion -->
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 text-md-end">
                <label for="descripcion" class="form-label">descripcion</label>
            </div>
            <div class="col-md-9">
                <input name="descripcion" type="text" value="{{ old('descripcion') }}" class="form-control" id="descripcion" placeholder="Ej: 5watts">
                @error('descripcion')
                    <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                @enderror
            </div>
        </div>

        <!-- imagen -->
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 text-md-end">
                <label for="imagen" class="form-label">imagen</label>
            </div>
            <div class="col-md-9">
                <input name="imagen" type="text" value="{{ old('imagen') }}" class="form-control" id="imagen" placeholder="Ej: path">
                @error('imagen')
                    <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                @enderror
            </div>
        </div>

        <!-- precio -->
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 text-md-end">
                <label for="precio" class="form-label">precio</label>
            </div>
            <div class="col-md-9">
                <input name="precio" type="int" value="{{ old('precio') }}" class="form-control" id="registro" placeholder="YYYY-MM-DD">
                @error('precio')
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


