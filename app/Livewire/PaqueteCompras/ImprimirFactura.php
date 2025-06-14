<?php

namespace App\Livewire\PaqueteCompras;

use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Paquete_compra\ordenCompra;

class ImprimirFactura extends Component
{
    public $nombresFactura;
    public $datosFactura;
    public $total = 0;
 public $compra_id;


    public function render()
    {


        return view('livewire.PaqueteCompras.imprimir-factura');
    }

    public function mount($compra_id)
    {
         $this->compra_id = $compra_id;
        $this->nombresFactura = ordenCompra::with('proveedor.persona')->get();
        //  dd($this->nombresFactura);
        $this->datosFactura = ordenCompra::with('productos')->get();
        $this->calculateTotal();
        // dd($this->datosFactura);



        //   dd($datos);
        // // return proveedor::with('persona')->get();
        // return null;
        // return proveedor::all();

        // $proveedor = proveedor::where('persona_id','datos->proveedor_id')->get();
    }

    public function calculateTotal()
    {
        $this->total = 0;

        foreach ($this->datosFactura as $datos) {

            foreach ($datos->productos as $prod) {
                $this->total += $prod->pivot->precio_total;
            }
        }
    }


    public function descargarPDF()
    // public function descargarPDF($orden_id)
    {
        // $orden = ordenCompra::with('productos')->findOrFail($orden_id);
        // $orden = ordenCompra::with('productos')->findOrFail($orden_id);

        $pdf = Pdf::loadView('resources\views\Paquete_compra\imprimir.blade.php');
        // $pdf = Pdf::loadView('pdf.orden-compra', compact('orden'));
        // return $pdf->download('orden-compra-' . $orden->id . '.pdf');
        return $pdf->download('orden-compra.pdf');
    }


    // <a href="{{ route('orden.pdf', ['id' => $compra_id]) }}" target="_blank" class="btn btn-primary">
    //     Descargar PDF
    // </a>

}
