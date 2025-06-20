@extends('layouts.index')

{{-- @section('title', 'Editar') --}}

@section('content')
    {{-- <div class="container d-flex align-items-center">
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
        </div> --

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
</div> --}}

    @if (session('success'))
        <x-flash-message :message="session('success')" type="success" />
    @endif

    @if (session('error'))
        <x-flash-message :message="session('error')" type="error" />
    @endif

    <div class="p-3 flex flex-col md:flex-row  gap-4  ">
        <div class=" w-full md:w-1/2 flex items-center justify-center ">
            <form action="{{ route('persona.update', [$persona->id]) }}" method="POST"
                class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md space-y-6">
                @method('PUT')
                @csrf

                <h2 class="text-2xl font-bold text-center text-gray-800">Actualizar cuenta</h2>


                <!-- Nombre Completo -->
                <div class="row mb-3 align-items-center">
                    <div class="col-md-3 text-md-end">
                        <label for="nombre" class="form-label">Nombre Completo</label>
                    </div>
                    <div class="col-md-9">
                        <input name="nombre" type="text" value="{{ $persona->nombre }}" class="form-control"
                            id="nombre" placeholder="Ej: Juan Pérez">
                        @error('nombre')
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
                        <input name="direccion" type="text" value="{{ $persona->direccion }}" class="form-control"
                            id="direccion" placeholder="Ej: Av. Principal #123">
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
                        <input name="telefono" type="tel" value="{{ $persona->telefono }}" class="form-control"
                            id="telefono" placeholder="Ej: +51 987654321">
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
                            <option value="usuario" {{ $persona->tipo == 'usuario' ? 'selected' : '' }}>Usuario Interno
                            </option>
                            <option value="proveedor" {{ $persona->tipo == 'proveedor' ? 'selected' : '' }}>Proveedor
                            </option>
                            <option value="administrador" {{ $persona->tipo == 'administrador' ? 'selected' : '' }}>admin
                            </option>
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
                        Actualizar
                    </button>
                </div>
            </form>
        </div>

        <div class=" w-full md:w-1/2 flex items-center justify-center ">
            <form action="{{ route('actualizar.credencial', [$persona->id]) }}" method="POST"
                class="bg-white p-8 rounded-2xl  shadow-2xl w-full max-w-md space-y-6">
                @method('PUT')
                @csrf

                <h2 class="text-2xl font-bold text-center text-gray-800">Actualizar credenciales</h2>

                <!-- Email -->
                <div class="row mb-3 align-items-center">
                    <div class="col-md-3 text-md-end">
                        <label for="email" class="form-label">Correo Electrónico</label>
                    </div>
                    <div class="col-md-9">
                        <input name="correo" type="email" value="{{ $persona->correo }}" class="form-control"
                            id="email" placeholder="ejemplo@mail.com">
                        @error('email')
                            <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                        @enderror
                    </div>
                </div>

                <!-- Contraseña actual-->
                <div class="row mb-3 align-items-center">
                    <div class="col-md-3 text-md-end">
                        <label for="currentPassword" class="form-label">Contraseña actual</label>
                    </div>
                    <div class="col-md-9">
                        <input name="contrasenaActual" type="Password" class="form-control" id="currentPassword"
                            placeholder="Mínimo 8 caracteres">
                        {{-- placeholder="Mínimo 8 caracteres" value="{{ 12345678 }}"> --}}
                        @error('currentPassword')
                            <div class="text-danger mt-1"><small><strong>{{ $message }}</strong></small></div>
                        @enderror
                    </div>
                </div>


                <!-- Contraseña -->
                <div class="row mb-3 align-items-center">
                    <div class="col-md-3 text-md-end">
                        <label for="newPassword" class="form-label">Contraseña nueva</label>
                    </div>
                    <div class="col-md-9">
                        <input name="contrasenaNueva" type="Password" class="form-control" id="newPassword"
                            placeholder="Mínimo 8 caracteres">
                        @error('newPassword')
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
                        <input name="confirmacion_contrasena" type="password" class="form-control"
                            id="password_confirmation" placeholder="Repite tu contraseña">
                    </div>
                </div>

                <!-- Botón de Enviar -->
                <div>
                    <button type="submit"
                        class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition">
                        Actualizar constrasena
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
