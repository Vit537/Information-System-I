<div class="p-6 bg-gray-50 min-h-screen">
  <header class="mb-8 max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center md:text-left">Resumen de Cotizaciones</h1>
  </header>

  <section class="max-w-3xl mx-auto space-y-6">
    @foreach ($cotizaciones as $cotizacion)
      <section class="bg-white rounded-lg shadow-md ring-1 ring-gray-300 p-6 hover:shadow-lg transition-shadow duration-300">
        <header class="mb-5 flex justify-between items-center border-b border-gray-200 pb-3">
          <h2 class="text-xl font-semibold text-gray-800">Cotización #{{ $cotizacion->id }}</h2>
          <span class="text-sm text-gray-500">Detalle</span>
        </header>

        <div class="space-y-4">
          @foreach ($this->getDetalle($cotizacion->id) as $tupla)
            <article class="flex justify-between items-center bg-gray-100 rounded-md p-3">
              <div>
                <p class="text-gray-700 font-semibold">Producto ID:</p>
                <p class="text-gray-600">{{ $tupla->producto_id }}</p>
              </div>
              <div>
                <p class="text-gray-700 font-semibold">Cantidad:</p>
                <p class="text-gray-600">{{ $tupla->cantidad }}</p>
              </div>
              <div>
                <p class="text-gray-700 font-semibold">Sub Total:</p>
                <p class="text-gray-800 font-medium">${{ number_format($tupla->precio_total, 2) }}</p>
              </div>
            </article>
          @endforeach
        </div>

        <div class="mt-6 text-right">
          <button 
            wire:click="confirm({{ $cotizacion->id }})"
            class="bg-blue-600 text-white px-6 py-2 rounded-md shadow hover:bg-blue-800 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
          >
            Vender
          </button>
        </div>
      </section>
    @endforeach
  </section>
</div>
