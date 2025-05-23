@extends('layouts.app')

{{-- @section('title', 'Registro') --}}

@section('content')
    <div class="container d-flex min-vh-100 align-items-center">
        <form action="{{ route('producto.verify') }}" method="POST" class="m-auto bg-white p-5 rounded shadow-lg"
            style="max-width: 800px;" enctype="multipart/form-data">
            @csrf
            <h2 class="text-center mb-4">Registro de producto</h2>

            <!-- Nombre Completo -->
            <div class="row mb-3 align-items-center">
                <div class="col-md-3 text-md-end">
                    <label for="nombre" class="form-label">Nombre producto </label>
                </div>
                <div class="col-md-9">
                    <input name="nombre" type="text" value="{{ old('nombre') }}" class="form-control" id="nombre"
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

                    <textarea name="descripcion" value="{{ old('descripcion') }}" id="" cols="50" rows="10"
                        class="form-control" id="descripcion" placeholder="Ej: describir el producto"></textarea>
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

                    {{-- placeholder="Ej: bebidas"> --}}

                    <input type="file" name="imagen" class="form-control" id="imagen" placeholder="Ej. img.jpeg">
                    @error('imagen')
                        <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                    @enderror
                </div>
            </div>




            <!-- precio -->
            <div class="row mb-3 align-items-center">
                <div class="col-md-3 text-md-end">
                    <label for="precio" class="form-label">precio </label>
                </div>
                <div class="col-md-9">
                    <input name="precio" type="number" value="{{ old('precio') }}" class="form-control" id="precio"
                        placeholder="Ej: 15.50" step="0.01">
                    @error('precio')
                        <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                    @enderror
                </div>
            </div>

            <!-- stock -->
            <div class="row mb-3 align-items-center">
                <div class="col-md-3 text-md-end">
                    <label for="stock" class="form-label">stock </label>
                </div>
                <div class="col-md-9">
                    <input name="stock" type="number" value="{{ old('stock') }}" class="form-control" id="stock"
                        placeholder="Ej: 15" step="0.01">
                    @error('stock')
                        <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                    @enderror
                </div>
            </div>


            <!-- stock minimo -->
            <div class="row mb-3 align-items-center">
                <div class="col-md-3 text-md-end">
                    <label for="stock_minimo" class="form-label">stock_minimo </label>
                </div>
                <div class="col-md-9">
                    <input name="stock_minimo" type="number" value="{{ old('stock_minimo') }}" class="form-control" id="stock_minimo"stock_minimo
                        placeholder="Ej: 15" step="0.01">
                    @error('stock_minimo')
                        <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                    @enderror
                </div>
            </div>

            <!-- categoria -->
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
