@extends('layouts.index')

{{-- @section('title', 'Editar') --}}

@section('content')
    <div class="flex items-center justify-center">
        {{-- class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-300 via-slate-600 to-slate-900 px-4"> --}}

        <form action="{{ route('password.email') }}" method="POST"
            class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md space-y-6">
            @csrf


            <h2 class="text-2xl font-bold text-center text-gray-800">Recuperar Contrasena</h2>

            {{-- @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif --}}

            @if (session('status'))
                <x-flash-message :message="session('status')" type="status" />
            @endif

            {{-- @if (session('error'))
                    <x-flash-message :message="session('error')" type="error" />
                @endif --}}

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" name="correo" id="email" value="{{ old('correo') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="ejemplo@mail.com" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            @error('correo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <!-- Botón de Enviar -->
            <div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition">
                    Enviar enlace de restablecimiento
                </button>

            </div>


        </form>


    </div>
@endsection
