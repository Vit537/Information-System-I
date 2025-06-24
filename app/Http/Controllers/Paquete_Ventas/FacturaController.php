<?php

namespace App\Http\Controllers\Paquete_Ventas;

use App\Http\Controllers\Controller;
use App\Models\Paquete_Ventas\cotizacion_detalle;
use App\Models\Paquete_Usuarios\Auth\Persona;
use App\Models\Paquete_Ventas\cotizacion;
use App\Models\Paquete_Ventas\venta;
use Illuminate\Http\Request;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;

class FacturaController extends Controller
{
    public function print($billId)
    {
        $venta = venta::find($billId);
        $detalle = cotizacion_detalle::where('cotizacion_id', $venta->cotizacion_id)->get();
        $cotizacion = cotizacion::find($venta->cotizacion_id);
        // dd($cotizacion);
        $cliente = persona::find($cotizacion->cliente_id);
        $pdf = PDF::loadView('paquete_ventas.pdf.factura', compact('detalle', 'billId', 'cliente'));

        return $pdf->download('factura-nro-'.$billId.'.pdf');
    }
}
