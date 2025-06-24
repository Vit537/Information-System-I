<div class="px-10 ">

    @if (session()->has('mensaje'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative mb-4">
            {{ session('mensaje') }}
        </div>
    @endif

    <div class="flex justify-between py-2">

        <div class="gap-4 flex w-full flex-col md:flex-row  justify-center items-center py-2">
            <a href="{{ route('crear.venta') }}"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Crear orden venta
            </a>

            {{-- <a href="#"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                lista producto
            </a> --}}

        </div>

    </div>


    <div class="flex gap-3 mb-4">
        <button wire:click="imprimir" class="bg-slate-300 hover:bg-slate-200 text-white px-2  py-1 rounded-lg"><img
                class="w-8" src="{{ asset('assets/printer.png') }}" alt="logo"></button>

        <button wire:click="exportarPDF" class="bg-slate-300 hover:bg-slate-200 text-white px-2 py-1  rounded-lg"><img
                class="w-8" src="{{ asset('assets/image.png') }}" alt="logo"></button>

        <button wire:click="exportarTareas"
            class="bg-slate-300 hover:bg-slate-200 text-white px-2 py-0 rounded-lg "><x-svg.excel /></button>
    </div>






    {{-- FILTROS --}}
    <div class="mb-4">

        <label for="search" class="block text-base font-medium text-slate-100 dark:text-slate-600 ">Buscador</label>
        <input id="search" type="text" wire:model.live="busqueda" placeholder="Buscar personas por nombre..."
            class="mt-1 border p-2 rounded w-full md:w-1/2  mb-4">

        <div x-data="{ abierto: false }" class="w-full mb-4">
            {{-- md:hidden --}}
            {{--  Botón para mostrar/ocultar --}}
            <div class="flex justify-start items-start md:w-1/4">
                <button @click="abierto = !abierto"
                    class=" w-full hover:bg-slate-900 dark:hover:bg-slate-300 text-white py-2 px-4 rounded mb-2 border-b-2 border-slate-500">
                    <span class="text-slate-300 dark:text-slate-900" x-show="!abierto"><i class="fa fa-filter"
                            aria-hidden="true"></i> Mostrar filtros</span>
                    <span class="text-slate-300 dark:text-slate-900" x-show="abierto"><i class="fa fa-filter"
                            aria-hidden="true"></i> Ocultar filtros</span>
                </button>
            </div>

            {{--  Contenedor de filtros  --}}
            {{-- <div x-show="abierto || window.innerWidth >= 768" x-transition class="space-y-4"> --}}
            <div x-show="abierto " x-transition class="space-y-4">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-base font-medium text-slate-100 dark:text-slate-600 ">Fecha
                            desde</label>
                        <input wire:model.live="fecha_inicio" type="date" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-base font-medium text-slate-100 dark:text-slate-600 ">Fecha
                            hasta</label>
                        <input wire:model.live="fecha_fin" type="date" class="border p-2 rounded w-full">
                    </div>
                </div>

                <div>
                    <label class="block text-base font-medium text-slate-100 dark:text-slate-600 ">Ordenar por
                        Fecha</label>
                    <select wire:model.live="orden" class="border p-2 rounded w-full md:w-1/2">
                        <option value="asc">Menor a mayor</option>
                        <option value="desc">Mayor a menor</option>
                    </select>
                </div>

            </div>
        </div>

    </div>

    {{-- DESGLOSE DE PRODUCTO --}}
    <div class="flex justify-center py-5 text-white dark:text-black w-full">
        <h1><strong>DESGLOSE POR PRODUCTO</strong></h1>
    </div>
    <div class=" py-5 text-slate-300 dark:text-black w-full">
        <p><strong>Ventas realizadas: </strong> {{ number_format($this->NroVentas()) }}</p>
        <p><strong>Monto total vendido : </strong>Bs. {{ number_format($this->montoTotal(), 2, ',', '.') }} </p>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2 bg-white">
        {{-- @if (strlen($busqueda) > 0) --}}
        {{-- <p>no entra a ningun lado</p> --}}

        @if (count($cotizaciones) > 0)
            <table
                class="w-full text-sm text-left text-gray-800 dark:text-black border-collapse bg-zinc-100 dark:bg-zinc-300 dark:border-s-gray-400
                ">
                <thead
                    class="text-xs text-black dark:text-gray-800 uppercase bg-gray-200 dark:bg-slate-400 border-b-4 border-gray-400 dark:border-gray-500 ">

                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            <h4>Producto</h4>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <h4>Cantidad vendida</h4>
                            {{-- <h5>Proveedor/Empresa</h5> --}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <h4>Precio unitario</h4>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <h4>Total vendido</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- contenido --}}
                    @foreach ($cotizaciones as $cotizacion)
                        <tr>

                            <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center ">
                                {{ $cotizacion->producto->nombre }}
                            </td>
                            {{-- <td class="border-b-2 border-gray-300 dark:border-gray-400 p-1 ">
                                <div class="font-semibold text-base text-gray-800 dark:text-gray-800">
                                    {{ $proveedor->proveedor->persona->nombre }}</div>
                                <div class="text-sm text-gray-600 dark:text-gray-600">
                                    {{ $proveedor->proveedor->persona->correo }}</div>
                            </td> --}}


                            <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center">
                                {{ $cotizacion->cantidad }}
                            </td>
                            <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center">
                                {{ $cotizacion->producto->precio }}
                            </td>
                            <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center">
                                {{ $cotizacion->precio_total }}
                            </td>
                            {{--  <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center">
                                @php
                                    $total = 0;
                                    $contador = 1;
                                @endphp
                                @foreach ($proveedor['productos'] as $prod)
                                    @php
                                        $total += $prod->pivot->cantidad * $prod->pivot->precio_unitario;
                                        $contador += 1;
                                        // $total += $producto['cantidad'] * $producto['precio'];
                                    @endphp
                                @endforeach

                                <p> $ {{ number_format($total, 2) }}</p>

                            </td> --}}

                        </tr>
                    @endforeach



                </tbody>
            </table>
        @else
            <p class="text-gray-500 bg-white">No se encontraron resultados para "{{ $busqueda }}".</p>
        @endif

    </div>






    {{-- scripts --}}
    <script>
        window.addEventListener('descargar-pdf', function() {
            window.open("{{ route('pdf.reporte-venta') }}", '_blank');
        });

        window.addEventListener('imprimir', function() {
            window.open("{{ route('imprimir-venta') }}", '_blank');
        });
    </script>

</div>




{{-- DETALLE POR TRANSACCION
    <div class="flex justify-center py-5 text-white dark:text-black">
        <h1><strong>DETALLE POR TRANSACCION</strong></h1>
    </div>

    {{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2 bg-white">
        {{-- @if (strlen($busqueda) > 0) --}}
{{-- <p>no entra a ningun lado</p> --}}


{{--  @if (count($productos) > 0)
            <table
                class="w-full text-sm text-left text-gray-800 dark:text-black border-collapse bg-zinc-100 dark:bg-zinc-300 dark:border-s-gray-400
                ">
                <thead
                    class="text-xs text-black dark:text-gray-800 uppercase bg-gray-200 dark:bg-slate-400 border-b-4 border-gray-400 dark:border-gray-500 ">

                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            <h4>Fecha</h4>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <h4>Cliente</h4>
                            {{-- <h5>Proveedor/Empresa</h5>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <h4>Producto</h4>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <h4>Cantidad</h4>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <h4>Precio Unitario</h4>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <h4>Total</h4>
                        </th>


                    </tr>
                </thead>
                <tbody>
                    {{-- contenido
                    @foreach ($productos as $producto)
                        <tr>

                            <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center ">
                                {{ $producto->created_at->format('Y-m-d') }}
                                {{-- {{ $producto->created_at->format('H:i') }}
                            </td>
                            <td class="border-b-2 border-gray-300 dark:border-gray-400 p-1 ">
                                {{ $this->getCliente($producto->cotizacion_id) }}

                            </td >{{--
                            <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center">
                                {{ $cotizacion->cantidad }}
                            </td>
                            <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center">
                                {{ $cotizacion->producto->precio }}
                            </td>
                            <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center">
                                {{ $cotizacion->precio_total }}
                            </td>
                          {{--  <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center">
                                @php
                                    $total = 0;
                                    $contador = 1;
                                @endphp
                                @foreach ($proveedor['productos'] as $prod)
                                    @php
                                        $total += $prod->pivot->cantidad * $prod->pivot->precio_unitario;
                                        $contador += 1;
                                        // $total += $producto['cantidad'] * $producto['precio'];
                                    @endphp
                                @endforeach

                                <p> $ {{ number_format($total, 2) }}</p>

                            </td

                        </tr>
                    @endforeach
                     {{-- @foreach ($cotizaciones as $cotizacion)
                        <tr>

                            <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center ">
                                {{ $cotizacion->producto->nombre }}
                            </td>

                            <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center">
                                {{ $cotizacion->cantidad }}
                            </td>
                            <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center">
                                {{ $cotizacion->producto->precio }}
                            </td>
                            <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center">
                                {{ $cotizacion->precio_total }}
                            </td>

                        </tr>
                    @endforeach




                </tbody>
            </table>
        @else
            <p class="text-gray-500 bg-white">No se encontraron resultados para "{{ $busqueda }}".</p>
        @endif

    </div> --}}
