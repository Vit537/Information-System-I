@extends('layouts.index')

{{-- @section('title', 'Editar') --}}

@section('content')



    <div class="flex items-center justify-center">


        <form action="{{ route('password.update') }}" method="POST"
            class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md space-y-6">
            @csrf


            <h2 class="text-2xl font-bold text-center text-gray-800">Recuperar Contrasena</h2>


            @if (session('status'))
                <x-flash-message :message="session('status')" type="status" />
            @endif

            <input type="hidden" name="token" value="{{ $token }}">
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" name="correo" id="email" value="{{ $correo ?? old('correo') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="ejemplo@mail.com" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            {{-- @error('correo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror --}}
            <!-- Contraseña -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Nueva Contrasena</label>
                <input type="password" name="password" id="password"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Mínimo 8 caracteres" required autocomplete="new-password">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contraseña confirmacion -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar
                    contrasena</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Mínimo 8 caracteres" required autocomplete="new-password">
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón de Enviar -->
            <div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition">
                    Restablecer Contrasena
                </button>

            </div>


        </form>


    </div>
@endsection
