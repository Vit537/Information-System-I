<div>

    <header class="flex justify-between items-start mb-6">
        <div class="">
            <h1 class="text-2xl font-bold uppercase">Widabol S.R.L.</h1>
            <p class="text-sm leading-5">
                Calle Dr. Alejandro Ramírez Nro. 28, Zona Equipetrol<br>
                Santa Cruz de la Sierra – Bolivia<br>
                Telf.: (591) 3-3436200 – Cel: (591) 78709088<br>
                N.I.T.: 1008003024
            </p>
        </div>
        <div class="text-right ">
            <p>Santa Cruz, <strong>19 de Mayo de 2025</strong></p>
            <p><strong>Orden de Compra Nº 031-25</strong></p>
        </div>
    </header>

    <section class="mb-4 grid grid-cols-2 gap-6 text-sm " >
        <div>
            {{-- <p><strong>Señor(es):</strong> LEGRAND BTICINO CHILE SPA</p> --}}
            <p><strong>Señor(es):</strong> Henry salas </p>
            <p><strong>Dirección:</strong> Av. Andres Bello 2457 Torre 2 Piso 15 COSTANERA CENTER
            </p>
            <p><strong>Att.:</strong> Robinson Neira</p>
            <p><strong>Fono:</strong> 02 550 53 32</p>
            <p><strong>Fax:</strong> 02 550 53 09</p>
            <p><strong>RUT:</strong> 79.602.730-4</p>
        </div>
        <div>
            <p><strong>Condiciones de pago:</strong> Crédito 90 días</p>
            <p><strong>Plazo de entrega:</strong> Inmediato</p>
            <p><strong>Destino:</strong> Santa Cruz de la Sierra, Bolivia</p>
            <p><strong>Condición de entrega:</strong> FCA, Santiago de Chile</p>
        </div>
    </section>


    <section class="mt-4">
        <table class="w-full table-auto border border-gray-300 text-center text-sm">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-300 px-2 py-1">N°</th>
                    <th class="border border-gray-300 px-2 py-1">Cantidad</th>
                    <th class="border border-gray-300 px-2 py-1">Unid</th>
                    <th class="border border-gray-300 px-2 py-1">Ref.</th>
                    <th class="border border-gray-300 px-2 py-1">Línea</th>
                    <th class="border border-gray-300 px-2 py-1">Descripción</th>
                    <th class="border border-gray-300 px-2 py-1">P. Unitario (USD)</th>
                    <th class="border border-gray-300 px-2 py-1">Total (USD)</th>
                </tr>
            </thead>
            <tbody>



                @foreach ($datosFactura as $datos)
                    @foreach ($datos->productos as $index)
                        <tr>
                            <td class="border px-2 py-1">1</td>
                            <td class="border px-2 py-1">{{ $index->pivot->cantidad }}</td>
                            <td class="border px-2 py-1">Pza</td>
                            <td class="border px-2 py-1">AH2112EB</td>
                            <td class="border px-2 py-1">NOBILE</td>
                            <td class="border px-2 py-1 text-left">{{ $index->descripcion }}</td>
                            <td class="border px-2 py-1">{{ $index->pivot->precio_unitario }}</td>
                            <td class="border px-2 py-1">{{ $index->pivot->precio_total }}</td>
                        </tr>
                    @endforeach
                @endforeach



            </tbody>
        </table>
    </section>
    <section class="mt-4 flex justify-end text-sm">
        <table class="w-1/2 text-right border-t border-gray-300">
            <tr>
                <td class="py-1">Subtotal USD:</td>
                <td class="py-1 pr-2 font-semibold">{{ number_format($total, 2) }}</td>
            </tr>
            <tr>
                <td class="py-1">Descuento:</td>
                <td class="py-1 pr-2">0.000</td>
            </tr>
            <tr class="border-t border-gray-300">
                <td class="py-1 font-bold">Total USD:</td>
                <td class="py-1 pr-2 font-bold">{{ number_format($total, 2) }}</td>
            </tr>


        </table>

    </section>

    <section class="mt-6 text-xs">
        <p class="mb-1"><strong>Notas: </strong></p>
        <ul class="list-disc pl-5">
            <li>Remitir factura, guía de despacho y packing list indicando el número de la orden de
                compra.</li>
            <li>El embalaje y empaque deben tener las condiciones adecuadas para transporte
                terrestre
                internacional.
            </li>
        </ul>
    </section>

    <footer class="mt-6 text-xs text-gray-500">
        Orden de Compra No.: 031-25
    </footer>

</div>



  {{-- <div class="p-10 flex justify-center items-center  ">
        <a href="#" target="_blank"
        {{-- <a href="{{ route('orden.pdf', ['id' => 5]) }}" target="_blank
            class="btn btn-primary bg-green-500  rounded-md px-3 py-4 hover:bg-green-300">
            <strong>Descargar PDF</strong>
        </a>
    </div>
    <section class="flex justify-center items-center">
        <div class="w-full  md:w-4/5">




            <div x-data="{ open: false }" class="">
                <button @click="open = !open"
                    class="w-full flex items-center justify-between py-2 px-3 rounded hover:bg-blue-300 border border-b-4  focus:outline-none">
                    <strong>Ver factura</strong>
                    <svg :class="{ 'rotate-90': open }" class="w-4 h-4 transform transition-transform" fill="none"
                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <div x-show="open" x-collapse class="ml-4 mt-1 space-y-1">


                </div>
            </div>
        </div>
    </section> --}}


{{--  --}}

{{-- <td class="border-b-2 border-gray-300 dark:border-gray-400">
                            {{-- <div class="font-semibold text-base text-gray-800 dark:text-gray-100">
                                {{ $proveedor->proveedor->persona->nombre }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                {{ $proveedor->proveedor->persona->correo }}</div>
                                 nadad
                        </td> --}}
{{-- <td class="border border-gray-300 dark:border-gray-600">{{ $proveedor->persona->nombre }}</td> --}}



{{-- <tr>
                        <td class="border px-2 py-1">1</td>
                        <td class="border px-2 py-1">1000</td>
                        <td class="border px-2 py-1">Pza</td>
                        <td class="border px-2 py-1">AH2112EB</td>
                        <td class="border px-2 py-1">NOBILE</td>
                        <td class="border px-2 py-1 text-left">TOMA ESTANDAR EUROUSA 250V/16A BCO</td>
                        <td class="border px-2 py-1">0.6480</td>
                        <td class="border px-2 py-1">648.000</td>


                     <tr>
                        <td class="border px-2 py-1">1</td>
                        <td class="border px-2 py-1">1000</td>
                        <td class="border px-2 py-1">Pza</td>
                        <td class="border px-2 py-1">AH2112EB</td>
                        <td class="border px-2 py-1">NOBILE</td>
                        <td class="border px-2 py-1 text-left">TOMA ESTANDAR EUROUSA 250V/16A BCO</td>
                        <td class="border px-2 py-1">0.6480</td>
                        <td class="border px-2 py-1">648.000</td>
                    </tr> --}}

{{-- <tr>
                    <td class="border px-2 py-1">1</td>
                    <td class="border px-2 py-1">1000</td>
                    <td class="border px-2 py-1">Pza</td>
                    <td class="border px-2 py-1">AH2112EB</td>
                    <td class="border px-2 py-1">NOBILE</td>
                    <td class="border px-2 py-1 text-left">TOMA ESTANDAR EUROUSA 250V/16A BCO</td>
                    <td class="border px-2 py-1">0.6480</td>
                    <td class="border px-2 py-1">648.000</td>
                </tr> --}}
