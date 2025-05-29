<div class="px-10 py-6">
    <h2 class="mb-6 text-2xl font-bold text-center text-white">
        Historial de Movimientos de Inventario
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div>
            <label class="block text-sm font-medium text-white">Producto:</label>
            <select wire:model="producto_id"
                class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 dark:bg-gray-800 dark:text-white">
                <option value="">Todos</option>
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-white">Desde:</label>
            <input type="date" wire:model="fecha_inicio"
                class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:text-white">
        </div>

        <div>
            <label class="block text-sm font-medium text-white">Hasta:</label>
            <input type="date" wire:model="fecha_fin"
                class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:text-white">
        </div>
    </div>

    <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-md rounded-lg">
        <table class="min-w-full text-sm text-left text-gray-800 dark:text-gray-200">
            <thead class="text-xs uppercase bg-slate-400 dark:bg-slate-700 text-black dark:text-white">
                <tr>
                    <th class="px-6 py-3">Fecha</th>
                    <th class="px-6 py-3">Producto</th>
                    <th class="px-6 py-3">Tipo</th>
                    <th class="px-6 py-3">Cantidad</th>
                    <th class="px-6 py-3">Motivo</th>
                    <th class="px-6 py-3">Registrado por</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($movimientos as $mov)
                    <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-6 py-2">{{ $mov->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-2">{{ $mov->producto->nombre }}</td>
                        <td class="px-6 py-2 capitalize">{{ $mov->tipo }}</td>
                        <td class="px-6 py-2">{{ $mov->cantidad }}</td>
                        <td class="px-6 py-2">{{ $mov->motivo }}</td>
                        <td class="px-6 py-2">{{ $mov->usuario->persona->nombre ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            No hay movimientos registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
