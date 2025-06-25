@extends('layouts.dashboard')

{{-- @section('title', 'Registro') --}}

@section('content')
    <div class="flex items-center justify-center">
        <form action="{{ route('categoria.update', [$categorium->id]) }}" method="POST"
            class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md space-y-6" >
            @method('PUT')
            @csrf
            <h2 class="text-2xl font-bold text-center text-gray-800">Actualizar categoria</h2>

            <!-- Nombre Completo -->
            <div class="row mb-3 align-items-center">
                <div class="col-md-3 text-md-end">
                    <label for="nombre" class="form-label">Nombre categoria </label>
                </div>
                <div class="col-md-9">
                    <input name="nombre" type="text" value="{{ $categorium->nombre }}" class="form-control" id="nombre"
                        placeholder="Ej: foco">
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

                    <textarea name="descripcion" cols="50" rows="10"
                        class="form-control" id="descripcion" placeholder="Ej: describir la categoria">{{ $categorium->descripcion }}</textarea>
                    @error('descripcion')
                        <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                    @enderror
                </div>
            </div>

              <div class="row mb-3 align-items-center">
            <div class="col-md-3 text-md-end">
                <label for="detalle" class="form-label">detalle</label>
            </div>
            <div class="col-md-9">

                <textarea name="detalle" value="{{ old('detalle') }}" id="" cols="50" rows="10" class="form-control" id="detalle" placeholder="Ej: detallar el producto"></textarea>
                @error('detalle')
                    <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                @enderror
            </div>
        </div>


            {{-- <!-- categoria -->
            <div class="row mb-3 align-items-center">
                <div class="col-md-3 text-md-end">
                    <label for="categoria" class="form-label">categoria </label>
                </div>
                <div class="col-md-9">
                 <select name="categoria_id">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                </div>
            </div> --}}




            <!-- Botón de Enviar -->
            <div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition">
                    Actualizar
                </button>
            </div>


        </form>
    </div>
@endsection
