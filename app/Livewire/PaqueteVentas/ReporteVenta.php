<?php

namespace App\Livewire\PaqueteVentas;

use Livewire\Component;
// use App\Models\Paquete_Usuarios\proveedor;
use App\Models\Paquete_compra\ordenCompra;
use App\Models\Paquete_Ventas\cotizacion;
use App\Models\Paquete_Ventas\cotizacion_detalle;
use Livewire\Attributes\On;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\RichText\RichText;
use App\Models\Paquete_Ventas\venta;


class ReporteVenta extends Component
{
        public $datos = [];
    public $mensaje = null;

    public $modoEdicion = false;
    public $item_id;
    public $nombre;
    public $correo;

    //search and filter

    public $busqueda = '';
    public $precio_min;
    public $precio_max;
    public $fecha_inicio;
    public $fecha_fin;
    public $orden = 'asc'; // asc o desc
    public $ordenP = 'asc'; // asc o desc

    public function render()
    {
        return view('livewire.paquete-ventas.reporte-venta', [
            'productos' =>  $this->getProductos(),
            'cotizaciones' => $this->getCotizacion()
        ]);
    }

     public function getCliente($id)
    {
        $clienteId = cotizacion::with('cliente.persona')->where('id', $id)->get();
        // dd($clienteId[0]->cliente->persona->nombre);
        return $clienteId[0]->cliente->persona->nombre;
    }
    public function montoTotal()
    {
        $datos = $this->getCotizacion();
        $total = 0;
        foreach ($datos as $data) {
            $total += $data->precio_total;
        }
        return $total;
    }

    public function NroVentas()
    {
        $ordenes = $this->getProductos();
        $cont = 0;
        foreach ($ordenes as $orden) {
            $cont++;
        }
        return $cont;
    }

    public function getCotizacion()
    {
        $ordenes =  $this->getProductos();


        $datos = collect();
        // Recolectamos todos los cotizacion_id únicos de las órdenes
        $cotizacionIds = $ordenes->pluck('cotizacion_id');

        foreach ($ordenes as $orden) {
            $detalles = cotizacion_detalle::with('producto')->where('cotizacion_id', $orden->cotizacion_id)->get();
            $datos = $datos->merge($detalles); // acumular resultados
        }


        if ($this->busqueda !== '') {

            $datos = $datos->filter(function ($detalles) {
                return str_contains(
                    strtolower($detalles->producto->nombre),
                    strtolower($this->busqueda)
                );
            });
        }

        // $nombre = $datos[0]->producto->nombre;

        // foreach ($datos as $data) {
        // }



        // dd($datos);

        return $datos;
    }
    // $cotizacionIds = $ordenes->pluck('cotizacion_id')->unique();
    // dd($cotizacionIds);
    // Consultamos todos los detalles cuya cotizacion_id coincida
    // $datos = cotizacion_detalle::whereIn('cotizacion_id', $cotizacionIds);

    public function getProductos()
    {
        // $ordenes = ordenCompra::with('proveedor.persona');
        $ordenes = venta::with([
            'cotizacion'
        ]);           // Aquí cargas la relación muchos a muchos




        //   dd($ordenes->get());
        // $ordenes = venta::with([
        //     'proveedor.persona',
        //     'productos' // Aquí cargas la relación muchos a muchos
        // ]);


        /////
        // if ($this->precio_min !== null) {
        //     $query->where('precio', '>=', $this->precio_min);
        // }

        // if ($this->precio_max !== null) {
        //     $query->where('precio', '<=', $this->precio_max);
        // }

        // if ($this->fecha_inicio) {
        //     $ordenes->whereDate('created_at', '>=', $this->fecha_inicio);
        // }

        // if ($this->fecha_fin) {
        //     $ordenes->whereDate('created_at', '<=', $this->fecha_fin);
        // }
        // dd($ordenes->get());
        // Ordenar por precio
        // $ordenes->orderBy('created_at', $this->orden);

        // $ordenes->orderBy('precio_total', $this->ordenP);


        // if ($this->busqueda !== '') {

        //     $ordenes->whereHas('proveedor.persona', function ($q) {
        //         $q->where('nombre', 'ILIKE', '%' . $this->busqueda . '%');
        //     });
        // }

        //    $te = $ordenes->get();
        //     dd($te);
        return $ordenes->get();

        // return ordenCompra::with('proveedor.persona')->get();
    }

    public function bold($dato1, $dato2)
    {
        // Crear texto enriquecido
        $richText = new RichText();
        $boldPart = $richText->createTextRun($dato1);
        $boldPart->getFont()->setBold(true); // negrita
        $richText->createText($dato2); // anade mas texto pero normal no negrita
        return $richText;
    }


    public function exportarTareas()
    {
        $data = $this->getCotizacion();
        // $data1 = $this->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Título
        $sheet->mergeCells('A1:D1');
        $sheet->setCellValue('A1', 'Reporte De Ventas');
        $sheet->getStyle('A1')->getFont()->setSize(18)->setBold(true)->getColor()->setARGB('993333');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

        //descripcion de encabezado
        $sheet->mergeCells('A3:D3');
        $sheet->mergeCells('A4:D4');
        $sheet->mergeCells('A5:D5');
        $nombre = Auth::user()->nombre;

        // Establecer en celda A3
        $tittle1 = $this->bold('Generado por: ', $nombre);
        $sheet->setCellValue('A3', $tittle1);



        // $tittle2 = $this->bold('Cliente: ', $data[0]->proveedor->persona->nombre);
        // $sheet->setCellValue('A4', $tittle2);
        // $sheet->setCellValue('A4', "Cliente: {$data[0]->proveedor->persona->nombre}");


        if ($this->fecha_inicio !== null && $this->fecha_fin !== null) {

            $tittle3 = $this->bold('Rango de fechas: ', $this->fecha_inicio . ' hasta ' . $this->fecha_fin);


            $sheet->setCellValue('A4', $tittle3);
        } else {
            $tittle3 = $this->bold('Rango de fechas: ', '...son todas las compras!');


            $sheet->setCellValue('A4', $tittle3);
            // $sheet->setCellValue('A5', 'Rango de fechas: ...son todas las compras!');
        }

        $tittle2 = $this->bold('Ventas realizadas: ', $this->NroVentas());
        $sheet->setCellValue('A5', $tittle2);
        $tittle4 = $this->bold('Monto total vendido: Bs.', number_format($this->montoTotal(), 2, ',', '.'));
        $sheet->setCellValue('A6', $tittle4);
        //  $sheet->setCellValue('A5', "Cliente: {$data[0]->proveedor->persona->nombre}");

        //     <div class=" py-5 text-slate-300 dark:text-black w-full">
        //     <p><strong>Ventas realizadas: </strong> {{ number_format($this->NroVentas()) }}</p>
        //     <p><strong>Monto total vendido : </strong>Bs. {{ number_format($this->montoTotal(), 2, ',', '.') }} </p>
        // </div>


        $sheet->getStyle('A3:A6')->getFont()->setSize(12)->getColor()->setARGB('070808');


        // Encabezados
        $encabezados = [
            'Producto',
            'Cantidad vendida',
            'Precio Unitario',
            'Precio vendido',


        ];

        $col = 'A';
        foreach ($encabezados as $header) {
            $sheet->setCellValue($col . '8', $header);
            $sheet->getColumnDimension($col)->setAutoSize(true);
            $sheet->getStyle($col . '8')->getFont()->setBold(true)->getColor()->setARGB('FFFFFF');
            $sheet->getStyle($col . '8')->getFill()->setFillType('solid')->getStartColor()->setARGB('004E60'); // azul oscuro
            $sheet->getStyle($col . '8')->getAlignment()->setHorizontal('center');
            $col++;
        }

        // // Fila de ejemplo
        // $sheet->setCellValue('A3', 'Escriba aquí el nombre de un invitado');
        // $sheet->getStyle('A3:I3')->getFill()->setFillType('solid')->getStartColor()->setARGB('D9EEF3'); // azul claro
        // $startRow = 3;
        // $data = [

        // dd($this->getProveedor());

        $startRow = 9;
        $contador = 0;

        foreach ($data as $i) {
            $row = $startRow + $contador;
            $color = ($contador % 2 == 0) ? 'D9EEF3' : 'FFFFFF'; // celeste / blanco

            $sheet->getStyle("A{$row}:D{$row}")->getFill()
                ->setFillType('solid')
                ->getStartColor()->setARGB($color);

            //     // Rellenar columnas

            $sheet->setCellValue("A{$row}", $i->producto->nombre);
            $sheet->setCellValue("B{$row}", $i->cantidad);
            $sheet->setCellValue("C{$row}", $i->producto->precio);
            $sheet->setCellValue("D{$row}", $i->precio_total);
            // $sheet->setCellValue("E{$row}", $i->proveedor->persona->telefono);
            // $total = 0;
            // foreach ($i->productos as $prod) {
            //     $total += $prod->pivot->cantidad * $prod->pivot->precio_unitario;
            // }
            // $sheet->setCellValue("F{$row}", $total);



            $contador += 1;
        }
        $row = $startRow + $contador - 1;
        $sheet->getStyle("A9:D{$row}")
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        //     $sheet->getStyle('A4:C5')->getFont()->setBold(true);
        $sheet->getStyle("A9:D{$row}")
            ->getAlignment()
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);


        // Descargar el archivo
        $fileName = 'ReporteVentas.xlsx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);

        $writer = new Xlsx($spreadsheet);
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    public function exportarPDF()
    {
        // $datos = $this->getCotizacion(); // o la tabla completa que tenés
        // session(['datos_pdf' => $datos]);
        $datos = $this->getCotizacion(); // o la tabla completa que tenés
        $total = $this->montoTotal();
        $nro = $this->NroVentas();
        session([
            'datos_pdf' => $datos,
            'total' => $total,
            'nro' => $nro
        ]);

        $this->js("window.dispatchEvent(new CustomEvent('descargar-pdf'))");
    }

    public function imprimir()
    {
        $datos = $this->getCotizacion(); // o la tabla completa que tenés
        $total = $this->montoTotal();
        $nro = $this->NroVentas();
        session([
            'datos_pdf' => $datos,
            'total' => $total,
            'nro' => $nro
        ]);

        $this->js("window.dispatchEvent(new CustomEvent('imprimir'))");
    }

}
