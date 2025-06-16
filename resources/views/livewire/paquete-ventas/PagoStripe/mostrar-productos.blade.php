 <!-- Cart -->
    <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-5">🧾 Lista productos</h2>
        @if (count($cart) > 0)
            <ul class="space-y-4 mb-6">
                @foreach ($this->getCartWithDetails() as $index => $item)
                    <li
                        class="flex justify-between items-center p-4 bg-gray-50 rounded-lg border border-gray-200 shadow-sm">
                        <div class="text-gray-700">
                            {{ $item['product']->nombre }} <span
                                class="text-sm text-gray-500">x{{ $item['quantity'] }}</span><br>
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

            <button wire:click="updateCompra"
                class="w-full py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-150">
                Actualizar compra
            </button>
        @else
            <p class="text-gray-500">Tu lista está vacia.</p>
        @endif
    </div>
