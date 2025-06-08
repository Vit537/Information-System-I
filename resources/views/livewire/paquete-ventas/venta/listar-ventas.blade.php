<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 p-6 bg-gray-50">
    
    @if($evento == 'venta')
        <!-- Create New Card -->
        <div class="flex flex-col justify-center items-center bg-white shadow-xl rounded-2xl p-6 border-2 border-dashed border-blue-300 hover:scale-105 transition">
            <div class="text-blue-500 text-4xl mb-2">
                <i class="fa fa-plus-circle"></i>
            </div>
            <h2 class="text-xl font-bold text-center mb-2">Convertir Cotizacion a Venta</h2>
            <a href="{{ route('crear.venta') }}" class="text-sm text-blue-600 hover:underline">Haz clic para comenzar</a>
        </div>
    @else
        <div class="flex flex-col justify-center items-center bg-white shadow-xl rounded-2xl p-6 border-2 border-dashed border-blue-300 hover:scale-105 transition">
            <h2 class="text-xl font-bold text-center mb-2">Ir a Gestionar Ventas</h2>
            <a href="{{ route('listar.ventas', ['evento' => 'venta']) }}" class="text-sm text-blue-600 hover:underline">Haz clic para ir</a>
        </div>
    @endif

    <!-- Ventas Cards -->
    @foreach($ventas as $venta)
        @php
            $cotizacion = $this->getCotizacion( $venta->cotizacion_id );
            $cardColors = ['from-green-400 to-teal-500', 'from-blue-500 to-cyan-500'];
            $bgGradient = $cardColors[array_rand($cardColors)];
        @endphp

        <div class="bg-gradient-to-br {{ $bgGradient }} text-white rounded-2xl shadow-lg p-6 transform transition hover:scale-105 hover:shadow-2xl">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">#{{ $venta->id }}</h3>
                <span class="text-sm bg-white text-black px-3 py-1 rounded-full font-semibold">Total: ${{ $cotizacion->monto_total }}</span>
            </div>

            <div class="mb-3 space-y-1">
                <p><i class="fa fa-user mr-2"></i><strong>Cliente:</strong> {{ $cotizacion->cliente_id }}</p>
                <p><i class="fa fa-briefcase mr-2"></i><strong>Empleado:</strong> {{ $cotizacion->empleado_id }}</p>
            </div>

            <div class="flex justify-between mt-4 space-x-2">
                <button 
                    wire:click="gotoDetalle({{ $cotizacion->id }})"
                    class="flex-1 flex items-center justify-center bg-white text-black px-3 py-2 rounded-md shadow-md hover:bg-gray-100 transition"
                    >
                    <i class="fa fa-eye mr-2"></i> Detalle
                </button>
            
                @if($evento == 'devolucion')
                    <button 
                        wire:click="gotoDevolucion({{ $venta->id }})"
                        class="flex-1 flex items-center justify-center bg-white text-black px-3 py-2 rounded-md shadow-md hover:bg-red-100 transition"
                    >
                        <i class="fa fa-trash mr-2"></i> Editar
                    </button>
                @elseif($evento == 'factura')
                    <div class="flex-1 flex items-center justify-center px-3 py-2 rounded-md shadow-md bg-white hover:bg-gray-100 transition">
                        <livewire:paquete-ventas.factura-printer :billId="$venta->id" />
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
