<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ConfiguracionController extends Controller
{
    //
    public function cambiarTema(Request $request)
    {
        $request->validate(['theme' => 'in:light,dark']);

        $usuario = auth()->user();
        $usuario->theme = $request->input('theme');
        $usuario->save();

        return response()->json(['status' => 'ok']);
    }





    public function exportarTareas()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Título
        $sheet->mergeCells('A1:I1');
        $sheet->setCellValue('A1', 'LISTA DE INVITADOS A LA BODA');
        $sheet->getStyle('A1')->getFont()->setSize(18)->setBold(true)->getColor()->setARGB('993333');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

        // Encabezados
        $encabezados = [
            'NOMBRE',
            'CALLE',
            'CIUDAD Y CÓDIGO POSTAL',
            'RELACIÓN',
            'NÚMERO DE PERSONAS',
            'INVITADO A LA BODA',
            'ACEPTADA/RECHAZADA',
            'INVITADO AL BANQUETE',
            'ACEPTADA/RECHAZADA'
        ];

        $col = 'A';
        foreach ($encabezados as $header) {
            $sheet->setCellValue($col . '2', $header);
            $sheet->getColumnDimension($col)->setAutoSize(true);
            $sheet->getStyle($col . '2')->getFont()->setBold(true)->getColor()->setARGB('FFFFFF');
            $sheet->getStyle($col . '2')->getFill()->setFillType('solid')->getStartColor()->setARGB('004E60'); // azul oscuro
            $sheet->getStyle($col . '2')->getAlignment()->setHorizontal('center');
            $col++;
        }

        // // Fila de ejemplo
        // $sheet->setCellValue('A3', 'Escriba aquí el nombre de un invitado');
        // $sheet->getStyle('A3:I3')->getFill()->setFillType('solid')->getStartColor()->setARGB('D9EEF3'); // azul claro
        // $startRow = 3;
        $data = [
            [
                'nombre' => 'Juan Pérez',
                'calle' => 'Av. Las Flores 123',
                'ciudad' => 'Santa Cruz, 12345',
                'relacion' => 'Amigo',
                'num_personas' => 2,
                'inv_boda' => 'Sí',
                'acepta_boda' => 'Aceptada',
                'inv_banquete' => 'Sí',
                'acepta_banquete' => 'Rechazada',
            ],
            [
                'nombre' => 'Ana López',
                'calle' => 'Calle 10 #456',
                'ciudad' => 'La Paz, 54321',
                'relacion' => 'Prima',
                'num_personas' => 1,
                'inv_boda' => 'Sí',
                'acepta_boda' => 'Aceptada',
                'inv_banquete' => 'Sí',
                'acepta_banquete' => 'Aceptada',
            ],
            [
                'nombre' => 'Carlos Gómez',
                'calle' => 'Zona Central',
                'ciudad' => 'Cochabamba, 10000',
                'relacion' => 'Compañero de trabajo',
                'num_personas' => 3,
                'inv_boda' => 'No',
                'acepta_boda' => '',
                'inv_banquete' => 'No',
                'acepta_banquete' => '',
            ],
        ];

        $startRow = 3;

        foreach ($data as $i => $fila) {
            $row = $startRow + $i;
            $color = ($i % 2 == 0) ? 'D9EEF3' : 'FFFFFF'; // celeste / blanco

            $sheet->getStyle("A{$row}:I{$row}")->getFill()
                ->setFillType('solid')
                ->getStartColor()->setARGB($color);

            // Rellenar columnas
            // if ($row === 4) {
            // $sheet->getStyle('A2:I2')->getFont()->setBold(true);
            // } else {
            $sheet->setCellValue("A{$row}", $fila['nombre']);
            $sheet->setCellValue("B{$row}", $fila['calle']);
            $sheet->setCellValue("C{$row}", $fila['ciudad']);
            $sheet->setCellValue("D{$row}", $fila['relacion']);
            $sheet->setCellValue("E{$row}", $fila['num_personas']);
            $sheet->setCellValue("F{$row}", $fila['inv_boda']);
            $sheet->setCellValue("G{$row}", $fila['acepta_boda']);
            $sheet->setCellValue("H{$row}", $fila['inv_banquete']);
            $sheet->setCellValue("I{$row}", $fila['acepta_banquete']);
            // }
            $sheet->getStyle('A4:C5')->getFont()->setBold(true);

            $sheet->getStyle('A3:I5')
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $sheet->getStyle('A3:I5')
                ->getAlignment()
                ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        }




        // Descargar el archivo
        $fileName = 'lista_invitados.xlsx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);

        $writer = new Xlsx($spreadsheet);
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
}


// $startRow = 3; // empieza donde quieras, por ejemplo después de los encabezados
// $data = [...]; // tus datos

// foreach ($data as $i => $fila) {
//     $rowNumber = $startRow + $i;
//     $color = ($i % 2 == 0) ? 'D9EEF3' : 'FFFFFF'; // celeste / blanco

//     $range = "A$rowNumber:I$rowNumber";

//     // Aplica fondo
//     $sheet->getStyle($range)->getFill()
//         ->setFillType('solid')
//         ->getStartColor()->setARGB($color);

//     // Agrega contenido (ejemplo)
//     $sheet->setCellValue("A$rowNumber", $fila['nombre']);
//     $sheet->setCellValue("B$rowNumber", $fila['calle']);
//     // ... continúa según tus columnas
// }
