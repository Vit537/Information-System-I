<div class="p-6 bg-gray-50 overflow-y-auto">
    <h1 class="text-3xl font-bold mb-6">Shopping</h1>
    @if ($errorMessage)
        <div class="bg-yellow-100 text-yellow-800 px-4 py-2 rounded mb-4">
            {{ $errorMessage }}
        </div>
    @endif
    <div class="mb-6">
        <label for="cliente_id" class="block text-lg font-medium text-gray-700 mb-2">Selecciona un cliente</label>
        <select id="cliente_id" wire:model.live="cliente_id" name="cliente_id" class="w-full p-3 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <option value=""> -- seleccionar cliente --</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
            @endforeach
        </select>
    </div>
    <p class="mt-2 text-sm text-blue-600">Cliente seleccionado: {{ $cliente_id }}</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <!-- Left Column: Products + Services -->
        <div>
            <!-- Services List -->
            <h2 class="text-2xl font-semibold text-gray-800 mb-5">🧾 Servicios</h2>
            <div class="grid gap-5">
                @foreach ($services as $service)
                    <div class="p-5 bg-white border border-gray-200 rounded-lg shadow hover:shadow-md transition duration-200">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="text-lg font-bold text-gray-700">{{ $service->nombre }}</h3>
                                <p class="text-sm text-gray-500">${{ $service->precio }}</p>
                            </div>
                            <button
                                wire:click="addToCart({{ $service->id }})"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-150"
                            >
                                Agregar
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Products List -->
            <h2 class="text-2xl font-semibold text-gray-800 mb-5">🛍️ Productos</h2>
            <div class="grid gap-5 mb-10">
                @foreach ($products as $product)
                    <div class="p-5 bg-white border border-gray-200 rounded-lg shadow hover:shadow-md transition duration-200">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="text-lg font-bold text-gray-700">{{ $product->nombre }}</h3>
                                <p class="text-sm text-gray-500">${{ $product->precio }}</p>
                            </div>
                            <button
                                wire:click="addToCart({{ $product->id }})"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-150"
                            >
                                Agregar
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Right Column: Cart -->
        <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-5">🛒 Carrito</h2>
            @if (count($cart) > 0)
                <ul class="space-y-4 mb-6">
                    @foreach ($this->getCartWithDetails() as $index => $item)
                        <li class="flex justify-between items-center p-4 bg-gray-50 rounded-lg border border-gray-200 shadow-sm">
                            <div class="text-gray-700">
                                {{ $item['product']->nombre }} <span class="text-sm text-gray-500">x{{ $item['quantity'] }}</span><br>
                                <span class="text-sm font-semibold">${{ number_format($item['subtotal'], 2) }}</span>
                            </div>
                            <button wire:click="removeFromCart({{ $index }})" class="hover:text-red-700">
                                <i class="fa fa-trash text-red-500"></i>
                            </button>
                        </li>
                    @endforeach
                </ul>

                <div class="text-lg font-bold text-gray-800 mb-6">
                    Total: ${{ $this->total }}
                </div>

                <button
                    wire:click="confirm"
                    class="w-full py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-150"
                >
                    Confirmar
                </button>
            @else
                <p class="text-gray-500">Tu carrito está vacío.</p>
            @endif
        </div>
    </div>
</div>
