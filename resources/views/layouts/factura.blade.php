<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Orden de Compra</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @livewireStyles


    {{-- {{-- script de livewire --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @media print {
            body {
                width: 8.5in;
                height: 11in;
                margin: 0;
                padding: 0.5in;
                font-size: 12px;
                color: #000;
            }

            @page {
                size: letter;
                margin: 0.5in;
            }

            .no-print {
                display: none !important;
            }
        }
    </style>





</head>

<body class="bg-white p-10 text-sm text-gray-900 ">

<div class="bg-slate-500 p-20">
hola henry

<a href="{{ route('orden.pdf', ['id' => 5]) }}" target="_blank" class="btn btn-primary">
    Descargar PDF
</a>
</div>

    <div class="max-w-5xl mx-auto border border-gray-300 p-6 rounded ">
        <header class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-2xl font-bold uppercase">Widabol S.R.L.</h1>
                <p class="text-sm leading-5">
                    Calle Dr. Alejandro Ramírez Nro. 28, Zona Equipetrol<br>
                    Santa Cruz de la Sierra – Bolivia<br>
                    Telf.: (591) 3-3436200 – Cel: (591) 78709088<br>
                    N.I.T.: 1008003024
                </p>
            </div>
            <div class="text-right">
                <p>Santa Cruz, <strong>19 de Mayo de 2025</strong></p>
                <p><strong>Orden de Compra Nº 031-25</strong></p>
            </div>
        </header>

        <section class="mb-4 grid grid-cols-2 gap-6 text-sm">
            <div>
                {{-- <p><strong>Señor(es):</strong> LEGRAND BTICINO CHILE SPA</p> --}}
                <p><strong>Señor(es):</strong> Henry salas huatta</p>
                <p><strong>Dirección:</strong> Av. Andres Bello 2457 Torre 2 Piso 15 COSTANERA CENTER</p>
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

        {{-- <section class="mt-4">
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
                    <tr>
                        <td class="border px-2 py-1">1</td>
                        <td class="border px-2 py-1">1000</td>
                        <td class="border px-2 py-1">Pza</td>
                        <td class="border px-2 py-1">AH2112EB</td>
                        <td class="border px-2 py-1">NOBILE</td>
                        <td class="border px-2 py-1 text-left">TOMA ESTANDAR EUROUSA 250V/16A BCO</td>
                        <td class="border px-2 py-1">0.6480</td>
                        <td class="border px-2 py-1">648.000</td>
                    </tr>
                     <tr>
                        <td class="border px-2 py-1">1</td>
                        <td class="border px-2 py-1">1000</td>
                        <td class="border px-2 py-1">Pza</td>
                        <td class="border px-2 py-1">AH2112EB</td>
                        <td class="border px-2 py-1">NOBILE</td>
                        <td class="border px-2 py-1 text-left">TOMA ESTANDAR EUROUSA 250V/16A BCO</td>
                        <td class="border px-2 py-1">0.6480</td>
                        <td class="border px-2 py-1">648.000</td>
                    </tr>
                     <tr>
                        <td class="border px-2 py-1">1</td>
                        <td class="border px-2 py-1">1000</td>
                        <td class="border px-2 py-1">Pza</td>
                        <td class="border px-2 py-1">AH2112EB</td>
                        <td class="border px-2 py-1">NOBILE</td>
                        <td class="border px-2 py-1 text-left">TOMA ESTANDAR EUROUSA 250V/16A BCO</td>
                        <td class="border px-2 py-1">0.6480</td>
                        <td class="border px-2 py-1">648.000</td>
                    </tr>
                     <tr>
                        <td class="border px-2 py-1">1</td>
                        <td class="border px-2 py-1">1000</td>
                        <td class="border px-2 py-1">Pza</td>
                        <td class="border px-2 py-1">AH2112EB</td>
                        <td class="border px-2 py-1">NOBILE</td>
                        <td class="border px-2 py-1 text-left">TOMA ESTANDAR EUROUSA 250V/16A BCO</td>
                        <td class="border px-2 py-1">0.6480</td>
                        <td class="border px-2 py-1">648.000</td>
                    </tr>
                     <tr>
                        <td class="border px-2 py-1">1</td>
                        <td class="border px-2 py-1">1000</td>
                        <td class="border px-2 py-1">Pza</td>
                        <td class="border px-2 py-1">AH2112EB</td>
                        <td class="border px-2 py-1">NOBILE</td>
                        <td class="border px-2 py-1 text-left">TOMA ESTANDAR EUROUSA 250V/16A BCO</td>
                        <td class="border px-2 py-1">0.6480</td>
                        <td class="border px-2 py-1">648.000</td>
                    </tr>

                     <tr>
                        <td class="border px-2 py-1">1</td>
                        <td class="border px-2 py-1">1000</td>
                        <td class="border px-2 py-1">Pza</td>
                        <td class="border px-2 py-1">AH2112EB</td>
                        <td class="border px-2 py-1">NOBILE</td>
                        <td class="border px-2 py-1 text-left">TOMA ESTANDAR EUROUSA 250V/16A BCO</td>
                        <td class="border px-2 py-1">0.6480</td>
                        <td class="border px-2 py-1">648.000</td>
                    </tr>
                </tbody>
            </table>
        </section> --}}

        @yield('print')



        <section class="mt-6 text-xs">
            <p class="mb-1"><strong>Notas: </strong></p>
            <ul class="list-disc pl-5">
                <li>Remitir factura, guía de despacho y packing list indicando el número de la orden de compra.</li>
                <li>El embalaje y empaque deben tener las condiciones adecuadas para transporte terrestre internacional.
                </li>
            </ul>
        </section>

        <footer class="mt-6 text-xs text-gray-500">
            Orden de Compra No.: 031-25
        </footer>
    </div>

    @livewireScripts
</body>

</html>



{{-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Orden de Compra</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            body {
                width: 21cm;
                height: 29.7cm;
                margin: 0;
            }
        }
    </style>
</head>
<body class="bg-white p-10 text-sm text-gray-900">
    <div class="max-w-5xl mx-auto border border-gray-300 p-6 rounded">
        <header class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-2xl font-bold uppercase">Widabol S.R.L.</h1>
                <p class="text-sm leading-5">
                    Calle Dr. Alejandro Ramírez Nro. 28, Zona Equipetrol<br>
                    Santa Cruz de la Sierra – Bolivia<br>
                    Telf.: (591) 3-3436200 – Cel: (591) 78709088<br>
                    N.I.T.: 1008003024
                </p>
            </div>
            <div class="text-right">
                <p>Santa Cruz, <strong>19 de Mayo de 2025</strong></p>
                <p><strong>Orden de Compra Nº 031-25</strong></p>
            </div>
        </header>

        <section class="mb-4 grid grid-cols-2 gap-6 text-sm">
            <div>
                <p><strong>Señor(es):</strong> LEGRAND BTICINO CHILE SPA</p>
                <p><strong>Dirección:</strong> Av. Andres Bello 2457 Torre 2 Piso 15 COSTANERA CENTER</p>
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
                    <tr>
                        <td class="border px-2 py-1">1</td>
                        <td class="border px-2 py-1">1000</td>
                        <td class="border px-2 py-1">Pza</td>
                        <td class="border px-2 py-1">AH2112EB</td>
                        <td class="border px-2 py-1">NOBILE</td>
                        <td class="border px-2 py-1 text-left">TOMA ESTANDAR EUROUSA 250V/16A BCO</td>
                        <td class="border px-2 py-1">0.6480</td>
                        <td class="border px-2 py-1">648.000</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="mt-4 flex justify-end text-sm">
            <table class="w-1/2 text-right border-t border-gray-300">
                <tr>
                    <td class="py-1">Subtotal USD:</td>
                    <td class="py-1 pr-2 font-semibold">648.000</td>
                </tr>
                <tr>
                    <td class="py-1">Descuento:</td>
                    <td class="py-1 pr-2">0.000</td>
                </tr>
                <tr class="border-t border-gray-300">
                    <td class="py-1 font-bold">Total USD:</td>
                    <td class="py-1 pr-2 font-bold">648.000</td>
                </tr>
            </table>
        </section>

        <section class="mt-6 text-xs">
            <p class="mb-1"><strong>Notas:</strong></p>
            <ul class="list-disc pl-5">
                <li>Remitir factura, guía de despacho y packing list indicando el número de la orden de compra.</li>
                <li>El embalaje y empaque deben tener las condiciones adecuadas para transporte terrestre internacional.</li>
            </ul>
        </section>

        <footer class="mt-6 text-xs text-gray-500">
            Orden de Compra No.: 031-25
        </footer>
    </div>
</body>
</html> --}}
