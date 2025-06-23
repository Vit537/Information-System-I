<div class="flex justify-center">
    <div class="bg-white w-full max-w-2xl rounded-3xl shadow-xl p-10">
        <h2 class="text-3xl font-bold text-gray-800 mb-10 text-center">🔔 Configurar Alertas</h2>
        <div class="space-y-6">
            @php
                $notifications = [
                    ['title' => 'Venta', 'desc' => 'Recive notificaciones sobre eventos CRUD de venta.', 'id' => 'venta'],
                    ['title' => 'Producto', 'desc' => 'Recive notificaciones sobre eventos CRUD de producto.', 'id' => 'producto'],
                    ['title' => 'Categoria', 'desc' => 'Recive notificaciones sobre eventos CRUD de categoria.', 'id' => 'categoria'],
                ];
            @endphp

            @foreach ($notifications as $notify)
            <div 
                x-data="{ enabled: {{$this->getConfig($notify['id'])}} }" 
                class="p-5 rounded-lg border shadow transition duration-300"
                :class="enabled 
                    ? 'bg-blue-50 text-blue-800 border-blue-200' 
                    : 'bg-gray-50 text-gray-400 border-gray-200 opacity-60'"
            >
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-lg font-semibold">{{ $notify['title'] }}</h3>
                    <button 
                        wire:click="confirm('{{ $notify['id'] }}')"
                        @click="enabled = !enabled"
                        class="text-sm px-4 py-1.5 rounded-full font-medium transition"
                        :class="enabled 
                            ? 'bg-blue-600 text-white hover:bg-blue-700' 
                            : 'bg-gray-300 text-gray-700 hover:bg-gray-400'"
                        x-text="enabled ? 'On' : 'Off'"
                    ></button>
                </div>
                <p class="text-sm">{{ $notify['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>