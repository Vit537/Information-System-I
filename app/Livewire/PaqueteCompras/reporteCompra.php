<?php

namespace App\Livewire\PaqueteCompras;

use Livewire\Component;
// use App\Models\Paquete_Usuarios\proveedor;
use App\Models\Paquete_compra\ordenCompra;
use Livewire\Attributes\On;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\RichText\RichText;



class reporteCompra extends Component
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


        return view('livewire.PaqueteCompras.reporte-compra', [
            'proveedores' =>  $this->getProveedor()
        ]);
    }

    public function getProveedor()
    {
        // $ordenes = ordenCompra::with('proveedor.persona');
        $ordenes = OrdenCompra::with([
            'proveedor.persona',
            'productos' // Aquí cargas la relación muchos a muchos
        ]);


        /////
        // if ($this->precio_min !== null) {
        //     $query->where('precio', '>=', $this->precio_min);
        // }

        // if ($this->precio_max !== null) {
        //     $query->where('precio', '<=', $this->precio_max);
        // }

        if ($this->fecha_inicio) {
            $ordenes->whereDate('created_at', '>=', $this->fecha_inicio);
        }

        if ($this->fecha_fin) {
            $ordenes->whereDate('created_at', '<=', $this->fecha_fin);
        }
        // dd($ordenes->get());
        // Ordenar por precio
        $ordenes->orderBy('created_at', $this->orden);

        // $ordenes->orderBy('precio_total', $this->ordenP);


        if ($this->busqueda !== '') {

            $ordenes->whereHas('proveedor.persona', function ($q) {
                $q->where('nombre', 'ILIKE', '%' . $this->busqueda . '%');
            });
        }

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
        $data = $this->getProveedor();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Título
        $sheet->mergeCells('A1:F1');
        $sheet->setCellValue('A1', 'Reporte De Compras');
        $sheet->getStyle('A1')->getFont()->setSize(18)->setBold(true)->getColor()->setARGB('993333');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

        //descripcion de encabezado
        $sheet->mergeCells('A3:D3');
        $sheet->mergeCells('A4:D4');
        $sheet->mergeCells('A5:D5');
        $nombre = Auth::user()->nombre;

        // Establecer en celda A3
        $tittle1 = $this->bold('Usuario que solicita el informe: ', $nombre);
        $sheet->setCellValue('A3', $tittle1);



        $tittle2 = $this->bold('Cliente: ', $data[0]->proveedor->persona->nombre);
        $sheet->setCellValue('A4', $tittle2);
        // $sheet->setCellValue('A4', "Cliente: {$data[0]->proveedor->persona->nombre}");


        if ($this->fecha_inicio !== null && $this->fecha_fin !== null) {

            $tittle3 = $this->bold('Rango de fechas: ', $this->fecha_inicio . ' hasta ' . $this->fecha_fin);


            $sheet->setCellValue('A5', $tittle3);
        } else {
            $tittle3 = $this->bold('Rango de fechas: ', '...son todas las compras!');


            $sheet->setCellValue('A5', $tittle3);
            // $sheet->setCellValue('A5', 'Rango de fechas: ...son todas las compras!');
        }
        $sheet->getStyle('A3:A5')->getFont()->setSize(12)->getColor()->setARGB('070808');


        // Encabezados
        $encabezados = [
            'Nroº Compra',
            'Nombre Proveedor/Empresa',
            'Fecha/Hora',
            'Direccion',
            'Telefono',
            'Precio Total',
        ];

        $col = 'A';
        foreach ($encabezados as $header) {
            $sheet->setCellValue($col . '7', $header);
            $sheet->getColumnDimension($col)->setAutoSize(true);
            $sheet->getStyle($col . '7')->getFont()->setBold(true)->getColor()->setARGB('FFFFFF');
            $sheet->getStyle($col . '7')->getFill()->setFillType('solid')->getStartColor()->setARGB('004E60'); // azul oscuro
            $sheet->getStyle($col . '7')->getAlignment()->setHorizontal('center');
            $col++;
        }

        // // Fila de ejemplo
        // $sheet->setCellValue('A3', 'Escriba aquí el nombre de un invitado');
        // $sheet->getStyle('A3:I3')->getFill()->setFillType('solid')->getStartColor()->setARGB('D9EEF3'); // azul claro
        // $startRow = 3;
        // $data = [

        // dd($this->getProveedor());

        $startRow = 8;
        $contador = 0;

        foreach ($data as $i) {
            $row = $startRow + $contador;
            $color = ($contador % 2 == 0) ? 'D9EEF3' : 'FFFFFF'; // celeste / blanco

            $sheet->getStyle("A{$row}:F{$row}")->getFill()
                ->setFillType('solid')
                ->getStartColor()->setARGB($color);

            //     // Rellenar columnas

            $sheet->setCellValue("A{$row}", $i->id);
            $sheet->setCellValue("B{$row}", $i->proveedor->persona->nombre);
            $sheet->setCellValue("C{$row}", $i->created_at);
            $sheet->setCellValue("D{$row}", $i->proveedor->persona->direccion);
            $sheet->setCellValue("E{$row}", $i->proveedor->persona->telefono);
            $total = 0;
            foreach ($i->productos as $prod) {
                $total += $prod->pivot->cantidad * $prod->pivot->precio_unitario;
            }
            $sheet->setCellValue("F{$row}", $total);



            $contador += 1;
        }
        $row = $startRow + $contador - 1;
        $sheet->getStyle("A8:F{$row}")
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        //     $sheet->getStyle('A4:C5')->getFont()->setBold(true);
        $sheet->getStyle("A8:F{$row}")
            ->getAlignment()
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);


        // Descargar el archivo
        $fileName = 'ReporteCompras.xlsx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);

        $writer = new Xlsx($spreadsheet);
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    public function exportarPDF()
    {
        $datos = $this->getProveedor(); // o la tabla completa que tenés
        session(['datos_pdf' => $datos]);

        $this->js("window.dispatchEvent(new CustomEvent('descargar-pdf'))");
    }

    public function imprimir()
    {
        $datos = $this->getProveedor(); // o la tabla completa que tenés
        session(['datos_pdf' => $datos]);

        $this->js("window.dispatchEvent(new CustomEvent('imprimir'))");
    }
}





//  {{-- <div wire:loading class="text-gray-500 bg-white">
//             Cargando resultados...
//         </div> --}}



    // public function exportarTareas()
    // {
    //     $spreadsheet = new Spreadsheet();
    //     $sheet = $spreadsheet->getActiveSheet();

    //     // Título
    //     $sheet->mergeCells('A1:I1');
    //     $sheet->setCellValue('A1', 'LISTA DE INVITADOS A LA BODA');
    //     $sheet->getStyle('A1')->getFont()->setSize(18)->setBold(true)->getColor()->setARGB('993333');
    //     $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

    //     // Encabezados
    //     $encabezados = [
    //         'NOMBRE',
    //         'CALLE',
    //         'CIUDAD Y CÓDIGO POSTAL',
    //         'RELACIÓN',
    //         'NÚMERO DE PERSONAS',
    //         'INVITADO A LA BODA',
    //         'ACEPTADA/RECHAZADA',
    //         'INVITADO AL BANQUETE',
    //         'ACEPTADA/RECHAZADA'
    //     ];

    //     $col = 'A';
    //     foreach ($encabezados as $header) {
    //         $sheet->setCellValue($col . '2', $header);
    //         $sheet->getColumnDimension($col)->setAutoSize(true);
    //         $sheet->getStyle($col . '2')->getFont()->setBold(true)->getColor()->setARGB('FFFFFF');
    //         $sheet->getStyle($col . '2')->getFill()->setFillType('solid')->getStartColor()->setARGB('004E60'); // azul oscuro
    //         $sheet->getStyle($col . '2')->getAlignment()->setHorizontal('center');
    //         $col++;
    //     }

    //     // // Fila de ejemplo
    //     // $sheet->setCellValue('A3', 'Escriba aquí el nombre de un invitado');
    //     // $sheet->getStyle('A3:I3')->getFill()->setFillType('solid')->getStartColor()->setARGB('D9EEF3'); // azul claro
    //     // $startRow = 3;
    //     $data = [
    //         [
    //             'nombre' => 'Juan Pérez',
    //             'calle' => 'Av. Las Flores 123',
    //             'ciudad' => 'Santa Cruz, 12345',
    //             'relacion' => 'Amigo',
    //             'num_personas' => 2,
    //             'inv_boda' => 'Sí',
    //             'acepta_boda' => 'Aceptada',
    //             'inv_banquete' => 'Sí',
    //             'acepta_banquete' => 'Rechazada',
    //         ],
    //         [
    //             'nombre' => 'Ana López',
    //             'calle' => 'Calle 10 #456',
    //             'ciudad' => 'La Paz, 54321',
    //             'relacion' => 'Prima',
    //             'num_personas' => 1,
    //             'inv_boda' => 'Sí',
    //             'acepta_boda' => 'Aceptada',
    //             'inv_banquete' => 'Sí',
    //             'acepta_banquete' => 'Aceptada',
    //         ],
    //         [
    //             'nombre' => 'Carlos Gómez',
    //             'calle' => 'Zona Central',
    //             'ciudad' => 'Cochabamba, 10000',
    //             'relacion' => 'Compañero de trabajo',
    //             'num_personas' => 3,
    //             'inv_boda' => 'No',
    //             'acepta_boda' => '',
    //             'inv_banquete' => 'No',
    //             'acepta_banquete' => '',
    //         ],
    //     ];

    //     $startRow = 3;

    //     foreach ($data as $i => $fila) {
    //         $row = $startRow + $i;
    //         $color = ($i % 2 == 0) ? 'D9EEF3' : 'FFFFFF'; // celeste / blanco

    //         $sheet->getStyle("A{$row}:I{$row}")->getFill()
    //             ->setFillType('solid')
    //             ->getStartColor()->setARGB($color);

    //         // Rellenar columnas
    //         // if ($row === 4) {
    //         // $sheet->getStyle('A2:I2')->getFont()->setBold(true);
    //         // } else {
    //         $sheet->setCellValue("A{$row}", $fila['nombre']);
    //         $sheet->setCellValue("B{$row}", $fila['calle']);
    //         $sheet->setCellValue("C{$row}", $fila['ciudad']);
    //         $sheet->setCellValue("D{$row}", $fila['relacion']);
    //         $sheet->setCellValue("E{$row}", $fila['num_personas']);
    //         $sheet->setCellValue("F{$row}", $fila['inv_boda']);
    //         $sheet->setCellValue("G{$row}", $fila['acepta_boda']);
    //         $sheet->setCellValue("H{$row}", $fila['inv_banquete']);
    //         $sheet->setCellValue("I{$row}", $fila['acepta_banquete']);
    //         // }
    //         $sheet->getStyle('A4:C5')->getFont()->setBold(true);

    //         $sheet->getStyle('A3:I5')
    //             ->getAlignment()
    //             ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    //         $sheet->getStyle('A3:I5')
    //             ->getAlignment()
    //             ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    //     }




    //     // Descargar el archivo
    //     $fileName = 'lista_invitados.xlsx';
    //     $tempFile = tempnam(sys_get_temp_dir(), $fileName);

    //     $writer = new Xlsx($spreadsheet);
    //     $writer->save($tempFile);

    //     return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    // }
