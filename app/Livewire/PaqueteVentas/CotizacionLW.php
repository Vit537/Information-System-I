<?php

namespace App\Livewire\PaqueteVentas;

use Livewire\Component;
use App\Models\Paquete_productos\producto;
use App\Models\Paquete_Ventas\cotizacion;
use App\Models\Paquete_Ventas\cotizacion_detalle;

class CotizacionLW extends Component
{
    public $count = 0;
    
    public function render()
    {
        return view('livewire.paquete-ventas.cotizacion.cotizacion',[
            'cotizaciones' => $this->getCotizaciones()
        ]);
    }

    public function getCotizaciones(){
        return cotizacion::all();
    }

    public function deleteCotizacion($id){
        $cotizacion = cotizacion::find($id);
        if ($cotizacion) {
            $cotizacion->delete();
        }
    }

    public function gotoDetalle($cotizacionId){
        redirect()->route('detalle.cotizacion', ['cotizacionId' => $cotizacionId]);
    }

    public function getProductInfo($id){
        return producto::find($id);
    }
}
