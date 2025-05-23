{{-- <div>
    {{-- The best athlete wants his opponent at his best. --

</div> --}}

<div class="bg-white rounded-lg shadow p-6">
    <div class="flex space-x-4 mb-6">
        <button
            @class([
                'px-4 py-2 rounded font-medium',
                'bg-blue-600 text-white' => $tipoReporte === 'stock',
                'bg-gray-200 text-gray-700' => $tipoReporte !== 'stock'
            ])
            wire:click="cambiarReporte('stock')"
        >
            Stock Crítico
        </button>
        {{-- <button
            @class([
                'px-4 py-2 rounded font-medium',
                'bg-blue-600 text-white' => $tipoReporte === 'perdidas',
                'bg-gray-200 text-gray-700' => $tipoReporte !== 'perdidas'
            ])
            wire:click="cambiarReporte('perdidas')"
        >
            Pérdidas
        </button> --}}
    </div>

    @if($tipoReporte === 'stock')
        <h3 class="text-lg font-semibold mb-4">Productos con stock crítico</h3>
        <div class="space-y-4">
            @forelse($productos as $producto)
                <div class="p-4 border border-red-200 bg-red-50 rounded flex justify-between items-center">
                    <span>{{ $producto->nombre }} (Stock: {{ $producto->stock }}/Mínimo: {{ $producto->stock_minimo }})</span>
                    <span class="text-red-600 font-medium">¡ALERTA!</span>
                </div>
            @empty
                <p class="text-gray-500">No hay productos con stock crítico</p>
            @endforelse
        </div>
    @else
        <h3 class="text-lg font-semibold mb-4">Productos con pérdidas</h3>
        <!-- Tabla similar para pérdidas -->
    @endif
</div>
