@extends('layouts.dashboard')

@section('content')
    <h1 class="flex text-2xl justify-center font-bold mb-4">Detalle Del Producto</h1>

    <section class="border rounded-md shadow-md p-4 bg-white" x-data="{ open: true }">
        <button @click="open = !open"
            class="w-full flex justify-between items-center py-2 border-b-4 border-red-600">
            <span class="font-semibold text-lg text-gray-800">Especificaciones</span>
            <svg class="w-5 h-5 transform transition-transform duration-300" :class="{ 'rotate-180': open }">
                <use xlink:href="#icon_sprite_icon-chevron_down"></use>
            </svg>
        </button>

        {{-- <div class="mt-4 space-y-2" x-show="open" x-transition>
            <x-product-detail label="Categoría" :value="$producto->categoria" />
            <x-product-detail label="Marca" :value="$producto->marca" />
            <x-product-detail label="Sabor" :value="$producto->sabor" />
            <x-product-detail label="Contenido neto" :value="$producto->contenido_neto" />
            <x-product-detail label="Formato" :value="$producto->formato" />
            <x-product-detail label="Empaque" :value="$producto->empaque" />
            <x-product-detail label="Retornabilidad" :value="$producto->retornabilidad" />
            <x-product-detail label="Azúcar" :value="$producto->azucar" />
            <x-product-detail label="SKU" :value="$producto->sku" />
        </div> --}}
        <div class="mt-4 space-y-2" x-show="open" x-transition>
            <x-product-detail label="Categoría" value="bebida" />
            <x-product-detail label="Marca" value="marca" />
            <x-product-detail label="Sabor" value="sabor" />
            <x-product-detail label="Contenido neto" value="contenido_neto" />
            <x-product-detail label="Formato" value="formato" />
            <x-product-detail label="Empaque" value="empaque" />
            <x-product-detail label="Retornabilidad" value="retornabilidad" />
            <x-product-detail label="Azúcar" value="azucar" />
            <x-product-detail label="SKU" value="sku" />
        </div>
    </section>
@endsection
