<?php

namespace App\Http\Controllers\Paquete_Compra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class imprimirFacturaController extends Controller
{
      public function descargarPDF($orden_id)
    // public function descargarPDF($orden_id)
    {
        // $orden = ordenCompra::with('productos')->findOrFail($orden_id);
        // $orden = ordenCompra::with('productos')->findOrFail($orden_id);

        $pdf = Pdf::loadView('Paquete_compra.imprimir.blade.php');
        // $pdf = Pdf::loadView('pdf.orden-compra', compact('orden'));
        // return $pdf->download('orden-compra-' . $orden->id . '.pdf');
        return $pdf->download('orden-compra.pdf');
    }
}
