

@extends('layouts.dashboard')

{{-- @section('title', 'Registro') --}}

@section('content')
<div class="flex items-center justify-center">
    <form action="{{ route('register.categoria') }}" method="POST" class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md space-y-6">
        @csrf
        <h2 class="text-2xl font-bold text-center text-gray-800">Registro de categoria</h2>

        <!-- Nombre Completo -->
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 text-md-end">
                <label for="nombre" class="form-label">Nombre categoria </label>
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

                <textarea name="descripcion" value="{{ old('descripcion') }}" id="" cols="50" rows="10" class="form-control" id="descripcion" placeholder="Ej: describir el producto"></textarea>
                @error('descripcion')
                    <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                @enderror
            </div>
        </div>

        {{-- <!-- categoria -->
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 text-md-end">
                <label for="categoria" class="form-label">categoria</label>
            </div>
           <div class="col-md-9">
                <input name="categoria_id" type="number" value="{{ old('categoria') }}" class="form-control" id="categoria" placeholder="Ej: bebidas">
                @error('categoria')
                    <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                @enderror
            </div>
        </div> --}}
         <!-- categoria -->
            <div class="row mb-3 align-items-center">
                <div class="col-md-3 text-md-end">
                    <label for="categoria" class="form-label">categorias </label>
                </div>
                <div class="col-md-9">
                 <select name="categoria_id" class="form-select">
                    <option value="">-- Sin categoría padre --</option> {{-- opción vacía --}}
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
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


