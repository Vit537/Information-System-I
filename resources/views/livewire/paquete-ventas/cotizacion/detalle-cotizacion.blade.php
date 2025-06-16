<div class="p-6 bg-gray-200 overflow-y-auto">
    <h1 class="text-3xl font-bold mb-6">Listado de Detalles {{ $cotizacionId }}</h1>

    <!-- Table of Contents -->
    <nav aria-label="Table of Contents" class="mb-6">
        <h2 class="text-xl font-semibold mb-3">Contenido</h2>
        <ul class="list-disc list-inside text-blue-600 space-y-1">
            <li>
                <a>Detalles de la cotización</a>
            </li>
            <!-- Add more TOC items here if needed -->
        </ul>
        <div class="flex justify-center items-center">
            {{-- <div>{{$cotizacionId}}</div> --}}
            <div class="rounded-sm bg-blue-400 hover:bg-blue-200 px-3 py-2">
                <a href="{{ route('pago.stripe') }}"><strong>Realizar pago</strong></a>
            </div>

{{-- <div>{{$cotizacionId}}</div> --}}

        </div>
    </nav>

    <div class="bg-white rounded-lg shadow">
        <!-- Desktop & tablet: regular table -->
        <div class="hidden md:block overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Cotización ID</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Producto ID</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Cantidad</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Precio Total</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($detalle as $tupla)
                        <tr class="hover:bg-blue-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tupla->cotizacion_id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tupla->producto_id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tupla->cantidad }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                ${{ number_format($tupla->precio_total, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Mobile: stacked cards -->
        <div class="md:hidden space-y-4 p-4">
            @foreach ($detalle as $tupla)
                <div class="border border-gray-200 rounded-lg p-4 shadow-sm">
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold text-gray-700">Cotización ID:</span>
                        <span class="text-gray-600">{{ $tupla->cotizacion_id }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold text-gray-700">Producto ID:</span>
                        <span class="text-gray-600">{{ $tupla->producto_id }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold text-gray-700">Cantidad:</span>
                        <span class="text-gray-600">{{ $tupla->cantidad }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold text-gray-700">Precio Total:</span>
                        <span class="text-gray-600">${{ number_format($tupla->precio_total, 2) }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
