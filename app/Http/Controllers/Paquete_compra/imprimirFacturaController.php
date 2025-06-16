<?php

namespace App\Http\Controllers\Paquete_Compra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Paquete_compra\ordenCompra;

class imprimirFacturaController extends Controller
{
    public function descargarPDF($orden_id)

    {
        //   $datosFactura = ordenCompra::with('productos')->get();
        //  $datosFactura = OrdenCompra::with('productos')->findOrFail($orden_id);
        $datosFactura = OrdenCompra::with('productos')->where('id', $orden_id)->get();
        $datosProveedor = OrdenCompra::with('proveedor.persona')->where('id', $orden_id)->get();
        $datosAdministrador = OrdenCompra::with('persona')->where('id', $orden_id)->get();


        //   dd($datosAdministrador);
        //   $nombres = ordenCompra::with('proveedor.persona')->get();

        //    dd($nombres);
        // ->setPaper('a4', 'portrait');
        $logoPath = public_path('assets/logo.jpg');
        $pdf = Pdf::loadView('layouts.factura', compact('datosFactura', 'logoPath', 'datosAdministrador', 'datosProveedor'))->setPaper('letter', 'portrait');;
        //  return view('layouts.factura', compact('datosFactura'));

        //    return $pdf->download('orden-compra.pdf');
        return $pdf->stream('orden_compra.pdf');

        // Datos de ejemplo
        // $productos = [
        //     ['nombre' => 'Producto A', 'cantidad' => 2, 'precio' => 50],
        //     ['nombre' => 'Producto B', 'cantidad' => 1, 'precio' => 100],
        //     ['nombre' => 'Producto C', 'cantidad' => 3, 'precio' => 25],
        // ];

        // $pdf = Pdf::loadView('layouts.factura', compact('productos'))->setPaper('letter', 'portrait');

        // return $pdf->stream('factura.pdf');
    }
}

 // $orden = ordenCompra::with('productos')->findOrFail($orden_id);

        //   $pdf = Pdf::loadView('layouts.factura',['compra_id' => $orden_id]);
        //  $pdf = Pdf::loadView('Paquete_compra.pdf-compras',['compra_id' => $orden_id]);
        // $pdf = Pdf::loadView('pdf.orden-compra', compact('orden'));

        // return $pdf->download('orden-compra-' . $orden->id . '.pdf');
        //  return $pdf->download('orden-compra.pdf');

          // return view('layouts.factura',['compra_id' => $orden_id]);


        //  return $pdf->stream('factura_'.$compra->id.'.pdf');
