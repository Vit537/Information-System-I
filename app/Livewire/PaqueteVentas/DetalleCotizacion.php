<?php

namespace App\Livewire\PaqueteVentas;

use Livewire\Component;
use App\Models\Paquete_Ventas\cotizacion_detalle;

class DetalleCotizacion extends Component
{
    public $cotizacionId = 0;
    public $detalle;
    public $coti_id=0;

    public function mount($cotizacionId)
    {
        $this->coti_id=$cotizacionId;
        $this->detalle = cotizacion_detalle::where('cotizacion_id', $this->cotizacionId)->get();
    }

    public function render()
    {
        return view('livewire.paquete-ventas.cotizacion.detalle-cotizacion');
    }
}
