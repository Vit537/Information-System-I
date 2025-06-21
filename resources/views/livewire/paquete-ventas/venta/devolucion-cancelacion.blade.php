<div class="bg-white shadow-xl rounded-lg p-8 max-w-3xl mx-auto mt-10 font-sans">
    <div class="border-b pb-4 mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">💸 Devoluciones</h2>
        <p class="text-gray-500 mt-1">Realizar devoluciones o Cancelar venta</p>
    </div>

    <div class="space-y-4">
        @foreach ($detalle as $cotizacion)
            @php
                $product = $this->getProductInfo($cotizacion->producto_id);
            @endphp
            <div class="flex items-center justify-between bg-gray-50 p-4 rounded-md shadow-sm hover:shadow-md transition">
                <div>
                    <h3 class="text-lg font-medium text-gray-700">{{ $product->nombre }}</h3>
                    <p class="text-sm text-gray-500">$: {{ $product->precio }} | x{{ $cotizacion->cantidad }}</p>
                    <p class="text-sm text-green-600 font-semibold mt-1">Refundable: ${{ number_format($cotizacion->precio_total, 2) }}</p>
                </div>
                <button
                    wire:click="updateTotal({{ $cotizacion->id }})"
                    class="px-4 py-2 bg-red-600 text-white text-sm font-semibold rounded-md shadow hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300"
                >
                    -
                </button>
            </div>
        @endforeach
    </div>

    <div class="mt-8 pt-4 border-t">
        <div class="flex items-center justify-between">
            <span class="text-gray-600 text-lg">Total a Devolver:</span>
            <span class="text-green-700 text-xl font-bold">${{ number_format($total, 2) }}</span>
        </div>

        <div class="mt-6 flex justify-end space-x-4">
            <button
                wire:click="deleteVenta"
                onclick="return confirm('¿Estás seguro de que deseas eliminar esta venta?');"
                class="px-6 py-3 bg-gray-500 text-white font-semibold text-sm rounded-md shadow hover:bg-red-700 transition-all"
            >
                Eliminar Venta
            </button>

            <button
                wire:click="confirmDevolution"
                class="px-6 py-3 bg-gray-500 text-white font-semibold text-sm rounded-md shadow-lg hover:bg-green-700 transition-all"
            >
                Confirmar Devolución
            </button>
        </div>
    </div>

</div>
