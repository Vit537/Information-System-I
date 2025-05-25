<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <a 
        href="{{ route('crear.cotizacion') }}"
        class="flex flex-col items-center rounded-xl shadow-lg p-5 text-black bg-white transition transform hover:scale-105 hover:shadow-2xl"
    >
        <h2 class="text-xl font-semibold mb-2 text-center">Crear Nuevo</h2>
        <i class="fa fa-add"></i>
    </a>
    @foreach($cotizaciones as $cotizacion)
        @php
            // Tailwind color palette options
            $cardColors = [
                'from-green-400 to-teal-500',
                'from-blue-500 to-cyan-500',
            ];
            $bgGradient = $cardColors[array_rand($cardColors)];
        @endphp

        <div class="rounded-xl shadow-lg p-6 text-white bg-gradient-to-br {{ $bgGradient }} transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
            <div class="mb-4">
                <h2 class="text-2xl font-bold tracking-wide mb-3">Cotización #{{ $cotizacion->id }}</h2>
                <p class="text-sm mb-1">
                    <span class="font-semibold">Cliente:</span> {{ $cotizacion->cliente_id }}
                </p>
                <p class="text-sm mb-1">
                    <span class="font-semibold">Empleado:</span> {{ $cotizacion->empleado_id }}
                </p>
                <p class="text-sm">
                    <span class="font-semibold">Total:</span> {{ $cotizacion->monto_total }}
                </p>
            </div>

            <div class="flex items-center space-x-3">
                <button wire:click="gotoDetalle({{ $cotizacion->id }})"
                    class="flex items-center space-x-1 bg-white text-black hover:bg-gray-200 font-medium py-1.5 px-4 rounded shadow-sm transition"
                    title="Editar cotización"
                >
                    <i class="fa fa-file"></i>
                    <span>Detalle</span>
                </button>

                <!-- Delete Button -->
                <button wire:click="deleteCotizacion({{ $cotizacion->id }})"
                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta cotización?');"
                    class="flex items-center space-x-1 bg-white text-black hover:bg-red-200 font-medium py-1.5 px-4 rounded shadow-sm transition"
                    title="Eliminar cotización">
                        <i class="fa fa-trash"></i>
                    <span>Eliminar</span>
                </button>
            </div>
        </div>
    @endforeach
</div>
