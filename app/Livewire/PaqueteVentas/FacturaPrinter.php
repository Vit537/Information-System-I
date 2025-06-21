<?php

namespace App\Livewire\PaqueteVentas;

use Livewire\Component;

class FacturaPrinter extends Component
{
    public $billId;

    public function print()
    {
        return redirect()->route('factura.print', ['id' => $this->billId]);
    }
    
    public function render()
    {
        return view('livewire.paquete-ventas.venta.factura-printer');
    }
}
