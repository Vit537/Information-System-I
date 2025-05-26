@extends('layouts.dashboard')

@section('content')
    <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  gap-6 w-fit mx-auto ">


        @foreach ($productos as $producto)
            @php
                // Tailwind color palette options
                $cardColors = [
                    'from-indigo-500 to-purple-600',
                    'from-pink-500 to-red-500',
                    'from-green-400 to-teal-500',
                    'from-blue-500 to-cyan-500',
                    'from-rose-500 to-pink-500',
                ];
                $bgGradient = $cardColors[array_rand($cardColors)];
            @endphp

            <div class="rounded-xl shadow-lg p-5 text-white bg-black transition transform hover:scale-105 hover:shadow-2xl">
                <a href="{{ route('tarjeta.producto', $producto->id) }}">
                    @if ($producto->imagen)
                        {{-- <img src="{{ asset('storage/imagenes/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" --}}
                        <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="Imagen"
                            class="w-full h-48 object-cover rounded-md mb-4">
                    @else
                        <span>Sin imagen</span>
                    @endif

                    <h2 class="text-xl font-semibold mb-2">{{ $producto->nombre }}</h2>
                    <p class="text-sm"><span class="font-medium">Descripcion:</span> {{ $producto->descripcion }}</p>
                    <p class="text-sm"><span class="font-medium">Precio:</span> {{ $producto->precio }}</p>
                    <p class="text-sm"><span class="font-medium">Stock:</span> {{ $producto->stock }}</p>
                    <p class="text-sm"><span class="font-medium">Stock Minimo:</span> {{ $producto->stock_minimo }}</p>
                    <p class="text-sm"><span class="font-medium">Categoria:</span>
                        {{ $producto->categoria->nombre ?? 'sin categoria' }}</p>
                </a>


                {{-- <div class="flex space-x-2">
                <!-- Edit Button -->
                <a href="{{ route('persona.edit', $producto->id) }}" class="bg-white hover:bg-gray-400 text-black font-semibold py-1 px-3 rounded">
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
            </div> --}}
            </div>
        @endforeach
    </div>
@endsection
