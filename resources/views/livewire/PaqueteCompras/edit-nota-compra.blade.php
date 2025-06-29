<div class="p-6 bg-gray-50 overflow-y-auto">
    <h1 class="text-3xl font-bold mb-6 text-center">Actualizar orden de Compra</h1>

    <div class="mb-6">
        <label for="proveedor_id" class="block text-lg font-medium text-gray-700 mb-2">Selecciona un proveedor</label>
        <select id="proveedor_id" wire:model.live="prov_id"  class="w-full p-3 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
            {{-- <option value=""> -- seleccionar proveedor --</option> --}}
           {{-- <option value="56"> --seleccionar el proveedor </option> --}}
           <option value="{{ $proveedorCompra->proveedor_id}}"> {{ $proveedorCompra->proveedor->persona->nombre }} </option>
            @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->persona->id }}">{{ $proveedor->persona->nombre }}</option>
            @endforeach
        </select>
    </div>
    {{-- name="proveedor_id" --}}
    <p class="mt-2 text-sm text-blue-600">Proveedor seleccionado: {{ $prov_id }}</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <!-- Products List -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-5">🛍️ Productos</h2>
            <div class="grid gap-5">
                @foreach ($products as $product)
                    <div class="p-5 bg-white border border-gray-200 rounded-lg shadow hover:shadow-md transition duration-200">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="text-lg font-bold text-gray-700">{{ $product['nombre'] }}</h3>
                                <p class="text-sm text-gray-500">${{ $product['precio'] }}</p>
                            </div>
                            <button
                                wire:click="addToCart({{ $product['id'] }})"
                                {{-- wire:click="addToCart({{ $product->id }})" --}}
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-150"
                            >
                                Agregar
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Cart -->
        <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-5">🧾 Lista productos</h2>
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
                    wire:click="updateCompra"
                    class="w-full py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-150"
                >
                    Actualizar compra
                </button>
            @else
                <p class="text-gray-500">Tu lista está vacia.</p>
            @endif
        </div>
    </div>


</div>
