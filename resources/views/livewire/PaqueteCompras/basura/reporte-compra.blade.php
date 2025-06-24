{{-- <div>
    {{-- In work, do what you enjoy.
</div> --}}




<div class="px-10 ">

    @if (session()->has('mensaje'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative mb-4">
            {{ session('mensaje') }}
        </div>
    @endif



    <div class="flex justify-between py-2">

        <!-- Ejemplo de uso en una vista -->

        <!-- O con tamaños personalizados -->
        {{-- <x-svg-icon :width="100" :height="100" /> --}}





        <div class="gap-4 flex w-full flex-col md:flex-row  justify-center items-center py-2">
            <a href="{{ route('add.compra') }}"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Crear orden compra
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
        {{-- <a href="{{ route('pdf.reporte.compra', ) }}"
            class="bg-slate-300 hover:bg-slate-200 text-white px-2 py-1  rounded-lg"><img class="w-8"
                src="{{ asset('assets/image.png') }}" alt="logo"></a> --}}
        <button wire:click="exportarTareas"
            class="bg-slate-300 hover:bg-slate-200 text-white px-2 py-0 rounded-lg "><x-svg.excel /></button>
    </div>
    {{-- datos del encabezado--
    <div class="mb-4 p-4 bg-gray-100 rounded shadow">
        <h2 class="text-xl font-semibold">Reporte de Ventas</h2>
        <p><strong>Cliente:</strong> {{ $clienteSeleccionado ?? 'Todos' }}</p>
        <p><strong>Empleado:</strong> {{ $empleadoSeleccionado ?? 'Todos' }}</p>
        <p><strong>Rango de fechas:</strong> {{ $fecha_inicio }} - {{ $fecha_fin }}</p>
    </div> --}}

    {{-- <a href="{{ route('print.tema') }}"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                print
            </a> --}}





    <div class="  mb-4">

        <label for="search" class="block text-base font-medium text-slate-100 dark:text-slate-600 ">Buscador</label>
        <input id="search" type="text" wire:model.live="busqueda" placeholder="Buscar personas por nombre..."
            class="mt-1 border p-2 rounded w-full md:w-1/2  mb-4">


        <div x-data="{ abierto: false }" class="w-full mb-4">
            {{-- md:hidden --}}
            {{-- <!-- Botón para mostrar/ocultar --}}
            <div class="flex justify-start items-start md:w-1/4">
                <button @click="abierto = !abierto"
                    class=" w-full hover:bg-slate-900 dark:hover:bg-slate-300 text-white py-2 px-4 rounded mb-2 border-b-2 border-slate-500">
                    <span class="text-slate-300 dark:text-slate-900" x-show="!abierto"><i class="fa fa-filter"
                            aria-hidden="true"></i> Mostrar filtros</span>
                    <span class="text-slate-300 dark:text-slate-900" x-show="abierto"><i class="fa fa-filter"
                            aria-hidden="true"></i> Ocultar filtros</span>
                </button>
            </div>

            {{-- <!-- Contenedor de filtros  --}}
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
                {{-- <div>
                    <label class="block text-base font-medium text-slate-100 dark:text-slate-600 ">Ordenar por
                        Precio</label>
                    <select wire:model.live="ordenP" class="border p-2 rounded w-full md:w-1/2">
                        <option value="asc">Menor a mayor</option>
                        <option value="desc">Mayor a menor</option>
                    </select>
                </div> --}}
            </div>
        </div>


    </div>





    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2 bg-white">
        {{-- @if (strlen($busqueda) > 0) --}}
        {{-- <p>no entra a ningun lado</p> --}}

        @if (count($proveedores) > 0)
            <table
                class="w-full text-sm text-left text-gray-800 dark:text-black border-collapse bg-zinc-100 dark:bg-zinc-300 dark:border-s-gray-400
                ">
                <thead
                    class="text-xs text-black dark:text-gray-800 uppercase bg-gray-200 dark:bg-slate-400 border-b-4 border-gray-400 dark:border-gray-500 ">

                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            <h4>Nroº compra</h4>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <h4>Nombre</h4>
                            <h5>Proveedor/Empresa</h5>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <h4>Fecha/Hora</h4>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <h4>direccion</h4>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <h4>telefono</h4>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <h4>Precio Total</h4>
                        </th>
                        {{-- <th scope="col" class="px-6 py-3">
                            <h4>Ver detalle/factura</h4>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <h4>Acciones</h4>
                        </th> --}}

                    </tr>
                </thead>
                <tbody>
                    {{-- contenido --}}
                    @foreach ($proveedores as $proveedor)
                        <tr>

                            <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center w-16">
                                {{ $proveedor->id }}
                            </td>
                            <td class="border-b-2 border-gray-300 dark:border-gray-400 p-1 ">
                                <div class="font-semibold text-base text-gray-800 dark:text-gray-800">
                                    {{ $proveedor->proveedor->persona->nombre }}</div>
                                <div class="text-sm text-gray-600 dark:text-gray-600">
                                    {{ $proveedor->proveedor->persona->correo }}</div>
                            </td>


                            <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center">
                                {{ $proveedor->created_at }}
                            </td>
                            <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center">
                                {{ $proveedor->proveedor->persona->direccion }}
                            </td>
                            <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center">
                                {{ $proveedor->proveedor->persona->telefono }}
                            </td>
                            <td class="border-b-2 border-gray-300 dark:border-gray-400 text-center">
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

                            </td>








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
            window.open("{{ route('pdf.reporte-compra') }}", '_blank');
        });

        window.addEventListener('imprimir', function() {
            window.open("{{ route('imprimir-compra') }}", '_blank');
        });
    </script>

</div>

{{-- @endif
         @else
                <p ><strong>No se encontraron resultados  .</strong></p>
            @endif --}}


{{-- <td class="border-b-2 border-gray-300 dark:border-gray-400">

                                <a href="{{ route('print.compras', $proveedor->id) }}"> <img
                                        src="https://images.emojiterra.com/google/android-10/512px/1f9fe.png"
                                        alt="Imagen" width="40"></a>

                            </td> --}}



{{-- <td class="border-b-2 border-gray-300 dark:border-gray-400">
                                <div class="flex space-x-2">


                                    <a href="{{ route('edit.compra', $proveedor->id) }}"
                                        class="focus:outline-none text-white bg-slate-500 hover:bg-slate-400 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-slate-500 dark:hover:bg-slate-400 dark:focus:ring-green-800">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>

                                    </a>

                                </div>

                            </td> --}}
