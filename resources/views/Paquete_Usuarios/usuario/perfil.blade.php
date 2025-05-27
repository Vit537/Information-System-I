@extends('layouts.dashboard')

@section('content')
    <h1 class="flex text-2xl justify-center font-bold mb-4 text-slate-50">Perfil del Usuario</h1>
    {{-- <div class="bg-slate-100 flex justify-center"><livewire:mostrar-pwd :usuario="$usuario" /></div> --}}

    <div class="rounded-xl shadow-md p-5 text-slate-600 flex justify-center items-center">
        {{-- @if ($producto->imagen)
                        {{-- <img src="{{ asset('storage/imagenes/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" --}}
        {{-- <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="Imagen"
                            class="w-full h-48 object-cover rounded-md mb-4">

                            @else
                            <span>Sin imagen</span>
                            @endif --}}

        <img src="https://media.istockphoto.com/id/2149036811/photo/african-lawyer-portrait-and-smile-with-street-happy-and-travel-for-work-opportunity-woman.jpg?s=1024x1024&w=is&k=20&c=c5ugnIy6UiQVB3i3wQD-V5k7E8ZK38BVSuBg_eCs12U="
            class="w-30 h-20 md:w-70 md:h-52 rounded-md" alt="Profile">


    </div>

    <div class="flex justify-center items-center">
        <div class="w-full md:w-1/2  ">
            <section class="border rounded-md shadow-md p-4 bg-white" x-data="{ open: true }">
                <button @click="open = !open"
                    class="w-full flex justify-between items-center py-2 border-b-4 border-red-600">
                    <span class="font-semibold text-lg text-gray-800">Especificaciones</span>
                    <svg class="w-5 h-5 transform transition-transform duration-300" :class="{ 'rotate-180': open }">
                        <use xlink:href="#icon_sprite_icon-chevron_down"></use>
                    </svg>
                </button>

                <div class="mt-4 space-y-2" x-show="open" x-transition>
                    <x-product-detail label="Nombre" :value="$usuario->nombre" />
                    <x-product-detail label="Correo" :value="$usuario->correo" />
                    <div class="flex border-b py-1">
                        <p class="w-52 font-medium text-gray-600">Contrasena</p>
                        <p class="text-gray-800 ">
                            <livewire:mostrar-pwd :usuario="$usuario" />
                        </p>
                    </div>
                    <x-product-detail label="Direccion" :value="$usuario->direccion" />
                    <x-product-detail label="Telefono" :value="$usuario->telefono" />
                    <x-product-detail label="Tipo" :value="$usuario->tipo" />

                </div>
            </section>
        </div>
    </div>
@endsection
