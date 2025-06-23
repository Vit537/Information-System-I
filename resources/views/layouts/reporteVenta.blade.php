<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .documento {
            /* width: 8in; */
            width: 7.2in;
            max-width: 7.2in;
            /* max-width: 8in; */
            margin: 0;
            /* padding: 0.5in; */
            padding: 0.1in;
            border: 1px solid #D1D5DB;
            border-radius: 5px;
            /* box-sizing: border-box; */

            background-color: #fff;
            box-sizing: border-box;
        }

        .parte {
            /* background-color: rgb(152, 37, 37) */

            background-color: rgb(89, 180, 140);
        }

        .header {
            /* text-align: center; */

            /* width: 50%; */
            background-color: rgb(141, 193, 98);
            margin-bottom: 20px;

        }

        .header h1 {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
        }

        .empresa-info {


            /* background-color: rgb(98, 135, 193); */
            border-bottom: 1px solid #c6cdd6;
            margin-bottom: 15px;
        }


        .cliente-info {

            /* background-color: rgb(97, 185, 38); */
            /* background-color: rgb(98, 135, 193); */
            border-bottom: 1px solid #c6cdd6;
            margin-bottom: 15px;
        }

        .info-line {
            /* background-color: rgb(38, 175, 185); */
            display: flex;
            justify-content: space-between;
            margin-bottom: 4px;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        th,
        td {
            border-bottom: 1px solid #333;
            padding: 6px;
            text-align: center;

        }

        th {
            background-color: #f2f2f2;

        }

        .totales {
            text-align: right;
            margin-top: 20px;
        }

        .footer {
            margin-top: 30px;
            font-size: 10px;
            color: #555;
            text-align: center;
        }
    </style>
</head>

<body>



    <div class="documento">

        <table>
            <thead>
                <tr>
                    <th
                        style="text-align: center ; width: 1.2in;        height:oin ;background-color:white; border:none;">
                        <div class="if-line">
                            <img src="{{ $logoPath }}" alt="Logo" style="width: 100px; height: auto;">
                        </div>
                    </th>
                    <th style="text-align: center ;  background-color:white; border:none; padding-right:1in;">
                        <h1>Reporte de Venta</h1>
                    </th>
                </tr>
            </thead>
        </table>
        <table>


            {{-- <div class="parte-1"> --}}
            <!-- Información de la Empresa -->

            <thead style="font-weight: normal;">
                <tr style="font-weight: normal;">
                    <th style="text-align: left ; border:none; background-color:white;">
                        {{-- <th class="empresa-info"> --}}

                        <div class="info-line" style="font-weight: normal;">
                            <strong>Empresa:</strong>
                            <span>Widabol S.R.L.</span>
                        </div>
                        <div class="info-line" style="font-weight: normal;">
                            <strong>Dirección:</strong>
                            <span>Calle Dr. Alejandro Ramírez Nro. 28, Equipetrol</span>
                        </div>
                        <div class="info-line" style="font-weight: normal;">
                            <strong>Teléfono:</strong>
                            <span>(591) 3-3436200 - Cel:(591) 78709088</span>
                        </div>
                        <div class="info-line" style="font-weight: normal;">
                            <strong>NIT:</strong>
                            <span>1008003024</span>
                        </div>
                        {{-- <p style="font-weight: normal"><strong>NIT:</strong> 1008003024</p> --}}
                    </th>

                    {{-- <th style="text-align: left ; border:none; background-color:white; padding-left:1.5in">

                        <p style="font-weight: normal"><strong>Orden de Compra:</strong> Nroº 031-{{ $datosAdministrador[0]->id }}
                        </p>
                        <p style="font-weight: normal"><strong>Fecha:</strong> {{ $datosAdministrador[0]->fecha }}</p>
                    <p><strong>Número:</strong> FAC-001-2025</p>
                        <p><strong>Fecha:</strong> 20 de Mayo de 2025</p>

                    </th> --}}
                </tr>
            </thead>


            <!-- Información del Cliente -->


            {{-- </div> --}}

        </table>

        <table>
            <thead>
                <tr style="border: none; ">
                    <td style="text-align: left; border:none;  ">
                        <div style=" border:none; width:300px">

                            <div class="info-line">
                                <strong>Generado por.:</strong>
                                <span>{{Auth::user()->nombre}}</span>
                                {{-- {{-- <span>Robinson Neira</span> --}}
                            </div>
                              {{-- <div class="cliente-info"> --}}
                            <div class="info-line">
                                <strong>Ventas Realizadas:</strong>
                                <span>{{$nro}}</span>
                                {{-- <span>Juan Pérez</span> --}}
                            </div>
                            <div class="info-line">
                                <strong>Monto total vendido: Bs.</strong>
                                <span>{{number_format($total, 2, ',', '.')}}</span>
                            </div>
                            <div class="info-line">
                                <strong>FAX:</strong>
                                <span>02 550 53 09</span>
                            </div>
                            <div class="info-line">
                                <strong>RUT:</strong>
                                <span>79.602.730-4</span>
                            </div>
                        </div>
                    </td>
                    {{-- <td style="text-align: left; border:none; ">
                        <div style=" border:none;">
                            <div class="info-line">
                                <strong>Condiciones de pago:</strong>
                                <span>Credito 90 dias</span>
                            </div>
                            <div class="info-line">
                                <strong>Plazo de entrega:</strong>
                                <span>Inmediato</span>
                            </div>
                            <div class="info-line">
                                <strong>Destino:</strong>
                                <span>Santa Cruz de la Sierra, Bolivia</span>
                            </div>
                            <div class="info-line">
                                <strong>Condicion de entrega:</strong>
                                <span>FCA, Santiago de chile</span>
                            </div>
                        </div>
                    </td> --}}
                </tr>
            </thead>
        </table>

        <!-- Tabla de Productos -->

        <table style="width: 100%; table-layout: fixed; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    {{-- <th style="border: 1px solid #333; padding: 6px; width: 10%;">Cantidad</th>
            <th style="border: 1px solid #333; padding: 6px; width: 50%;">Producto</th>
            <th style="border: 1px solid #333; padding: 6px; width: 20%;">Precio Unitario</th>
            <th style="border: 1px solid #333; padding: 6px; width: 20%;">Total</th> --}}
                    {{-- <th>Cantidad</th> --}}
                    {{-- <th>Producto</th>
                    <th>Precio Unitario</th>
                    <th>Total</th> --}}
                    <th style="">Nombre</th>
                    <th style=" ">Cantidad vendida</th>
                    <th class="border border-gray-300 px-2 py-1">Precio Unitario</th>
                    <th class="border border-gray-300 px-2 py-1">Precio vendido</th>
                    {{-- <th class="border border-gray-300 px-2 py-1">Telefono</th>
                    <th class="border border-gray-300 px-2 py-1">Precio Total</th> --}}
                    {{-- <th class="border border-gray-300 px-2 py-1">P. Unitario (USD)</th>
                    <th class="border border-gray-300 px-2 py-1">Total (USD)</th> --}}

                </tr>
            </thead>
            <tbody>
                {{-- @php
                    $total = 0;

                @endphp --}}

                @foreach ($datos as $fila)
                    {{-- @foreach ($datos->productos as $index) --}}
                    <tr>
                        <td style="">{{ $fila->producto->nombre }}</td>
                        <td class="border px-2 py-1">{{ $fila->cantidad }}</td>
                        <td class="border px-2 py-1">{{ $fila->producto->precio }}</td>
                        <td class="border px-2 py-1">{{ $fila->precio_total }}</td>
                        {{-- <td class="border px-2 py-1">{{ $fila->proveedor->persona->telefono }}</td>
                        @php
                            $total =0;
                            foreach ($fila->productos as $prod) {
                                $total += $prod->pivot->cantidad * $prod->pivot->precio_unitario;
                            }

                            // $total += $producto['cantidad'] * $producto['precio'];

                        @endphp
                        <td class="border px-2 py-1">{{ $total }}</td> --}}

                        {{-- <td class="border px-2 py-1">{{ $total }}</td> --}}

                    </tr>

                    {{-- @endforeach --}}
                @endforeach
            </tbody>
        </table>



        <!-- Notas -->
        <div class="notas" style="margin-top: 20px;">
            <p><strong>Notas:</strong></p>
            <ul style="list-style-type: disc; padding-left: 20px;">
                <li>Todos los datos mostrados son respaldo de la empresa.</li>
                <li>Para consultas contactar al correo: ventas@widabol.com</li>
            </ul>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; {{ date('Y') }} Widabol S.R.L. Todos los derechos reservados.
        </div>

    </div>

</body>

</html>
