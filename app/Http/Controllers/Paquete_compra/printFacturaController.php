<?php

namespace App\Http\Controllers\Paquete_compra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Paquete_compra\ordenCompra;

class printFacturaController extends Controller
{
    public function descargarPDF($orden_id){

        $datosFactura = OrdenCompra::with('productos')->where('id', $orden_id)->get();
        $datosProveedor = OrdenCompra::with('proveedor.persona')->where('id', $orden_id)->get();
        $datosAdministrador = OrdenCompra::with('persona')->where('id', $orden_id)->get();

        $logoPath = public_path('assets/logo.jpg');
        $pdf = Pdf::loadView('layouts.factura', compact('datosFactura', 'logoPath', 'datosAdministrador', 'datosProveedor'))->setPaper('letter', 'portrait');;

        return $pdf->stream('orden_compra.pdf');
    }
}
