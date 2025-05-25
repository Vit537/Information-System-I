@extends('layouts.dashboard')

@section('content')
    <h1 class="flex text-2xl justify-center font-bold mb-4 text-slate-50">Perfil del Usuario</h1>

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
            <x-product-detail label="Contrasena" :value="str_repeat('*', strlen($usuario->contrasena))" />
            <x-product-detail label="Direccion" :value="$usuario->direccion" />
            <x-product-detail label="Telefono" :value="$usuario->telefono" />
            <x-product-detail label="Tipo" :value="$usuario->tipo" />

        </div>
    </section>
@endsection
