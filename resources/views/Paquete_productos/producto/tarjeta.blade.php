@extends('layouts.dashboard')

{{-- @section('title', 'Registro') --}}

@section('content')
    <div class="flex items-center justify-center ">

        <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-3xl space-y-6">

            <div class="p-10">
                 @if ($producto->imagen)

                        <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="Imagen"
                            class="w-full h-52 object-cover rounded-md mb-4">
                    @else
                        <span>Sin imagen</span>
                    @endif
            </div>
            <div class="px-8">
                <h1 class="flex text-2xl justify-center font-bold mb-4 text-black">Detalle producto</h1>

                <section class="border rounded-md shadow-md px-10 bg-white " x-data="{ open: true }">
                    <button @click="open = !open"
                        class="w-full flex justify-between items-center py-2 border-b-4 border-red-600">
                        <span class="font-semibold text-lg text-gray-800">Especificaciones</span>
                        <svg class="w-5 h-5 transform transition-transform duration-300" :class="{ 'rotate-180': open }">
                            <use xlink:href="#icon_sprite_icon-chevron_down"></use>
                        </svg>
                    </button>

                    <div class="mt-4 space-y-2" x-show="open" x-transition>
                        <x-product-detail label="Nombre" :value="$producto->nombre" />
                        <x-product-detail label="Descripcion" :value="$producto->descripcion" />
                        <x-product-detail label="Precio" :value="$producto->precio" />
                        <x-product-detail label="Stock" :value="$producto->stock" />
                        <x-product-detail label="Stock Minimo" :value="$producto->stock_minimo" />
                        <x-product-detail label="Categoria" :value="$producto->categoria->nombre ?? 'sin categoria'" />

                    </div>
                </section>
            </div>
        </div>
        {{-- <form action="{{ route('producto.verify') }}" method="POST" class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md space-y-6" enctype="multipart/form-data">
            @csrf
            <h2 class="text-2xl font-bold text-center text-gray-800">Registro de producto</h2>













    <!-- Botón de Enviar -->
            <div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition">
                    Registrar
                </button>
            </div>


        </form> --}}
    </div>
@endsection
