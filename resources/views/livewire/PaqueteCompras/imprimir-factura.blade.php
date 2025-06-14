<div >

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
                {{--  --}}

                {{-- <td class="border-b-2 border-gray-300 dark:border-gray-400">
                            {{-- <div class="font-semibold text-base text-gray-800 dark:text-gray-100">
                                {{ $proveedor->proveedor->persona->nombre }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                {{ $proveedor->proveedor->persona->correo }}</div>
                                 nadad
                        </td> --}}
                {{-- <td class="border border-gray-300 dark:border-gray-600">{{ $proveedor->persona->nombre }}</td> --}}




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

</div>
