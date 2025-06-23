<?php

namespace App\Http\Controllers\Paquete_compra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Paquete_compra\ordenCompra;

use App\Livewire\PaqueteCompras\reporteCompra;

class printFacturaController extends Controller
{
    public function descargarPDF($orden_id){

        $datosFactura = OrdenCompra::with('productos')->where('id', $orden_id)->get();
        $datosProveedor = OrdenCompra::with('proveedor.persona')->where('id', $orden_id)->get();
        $datosAdministrador = OrdenCompra::with('persona')->where('id', $orden_id)->get();

        $logoPath = public_path('assets/logo.jpg');
        $pdf = Pdf::loadView('layouts.factura', compact('datosFactura', 'logoPath', 'datosAdministrador', 'datosProveedor'))->setPaper('letter', 'portrait');;

        return $pdf->download('orden_compra.pdf');
        // return $pdf->stream('orden_compra.pdf');
    }
    // imprimir compras
    public function reportePDF(){


         $datos = session('datos_pdf');
        //    dd($datos);

         $logoPath = public_path('assets/logo.jpg');
        $pdf = Pdf::loadView('layouts.reporte', compact('datos', 'logoPath'))->setPaper('letter', 'portrait');;

        return $pdf->download('orden_compra.pdf');
        // return $pdf->stream('orden_compra.pdf');
    }

    public function imprimir(){


         $datos = session('datos_pdf');


         $logoPath = public_path('assets/logo.jpg');
        $pdf = Pdf::loadView('layouts.reporte', compact('datos', 'logoPath'))->setPaper('letter', 'portrait');;

        return $pdf->stream('orden_compra.pdf');

    }

    // imprimir ventas
    public function reportePDFVenta(){


         $datos = session('datos_pdf');
        //  dd($datos);
        $total = session('total');
        $nro = session('nro');
        //    dd($datos);

         $logoPath = public_path('assets/logo.jpg');
        $pdf = Pdf::loadView('layouts.reporteVenta', compact('datos', 'logoPath','total', 'nro'))->setPaper('letter', 'portrait');;

        return $pdf->download('orden_venta.pdf');
        // return $pdf->stream('orden_compra.pdf');
    }

    public function imprimirVenta(){


         $datos = session('datos_pdf');
          $total = session('total');
        $nro = session('nro');


         $logoPath = public_path('assets/logo.jpg');
        $pdf = Pdf::loadView('layouts.reporteVenta', compact('datos', 'logoPath','total', 'nro'))->setPaper('letter', 'portrait');;

        return $pdf->stream('orden_venta.pdf');

    }
}
