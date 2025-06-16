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

        $this->datosFactura = ordenCompra::with('productos')->get();
        $this->calculateTotal();

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



    public function imprimirFactura()
    {
        $this->dispatchBrowserEvent('imprimir');
    }




}

// <a href="{{ route('orden.pdf', ['id' => $compra_id]) }}" target="_blank" class="btn btn-primary">
//     Descargar PDF
// </a>
