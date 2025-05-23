@extends('layouts.dashboard')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($empleados as $empleado)
        @php
            // Tailwind color palette options
            $cardColors = [
                'from-indigo-500 to-purple-600',
                'from-pink-500 to-red-500',
                'from-green-400 to-teal-500',
                'from-blue-500 to-cyan-500',
                'from-rose-500 to-pink-500'
            ];
            $bgGradient = $cardColors[array_rand($cardColors)];
        @endphp

        <div class="rounded-xl shadow-lg p-5 text-white bg-gradient-to-br {{ $bgGradient }} transition transform hover:scale-105 hover:shadow-2xl">
            <h2 class="text-xl font-semibold mb-2">{{ $empleado->nombre }}</h2>
            <p class="text-sm"><span class="font-medium">Correo:</span> {{ $empleado->correo }}</p>
            <p class="text-sm"><span class="font-medium">Dirección:</span> {{ $empleado->direccion }}</p>
            <p class="text-sm"><span class="font-medium">Teléfono:</span> {{ $empleado->telefono }}</p>
            <p class="text-sm mb-4"><span class="font-medium">Tipo:</span> {{ ucfirst($empleado->tipo) }}</p>

            <div class="flex space-x-2">
                <!-- Edit Button -->
                <a href="{{ route('persona.edit', $empleado->id) }}" class="bg-white hover:bg-gray-400 text-black font-semibold py-1 px-3 rounded">
                    <i class="fa fa-edit"></i>
                </a>

                <!-- Delete Button -->
                <form action="{{ route('persona.destroy', $empleado->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este empleado?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-white hover:bg-gray-400 text-black font-semibold py-1 px-3 rounded">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>

@endsection
