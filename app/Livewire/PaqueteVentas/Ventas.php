<?php

namespace App\Livewire\PaqueteVentas;

use Livewire\Component;
use App\Models\Paquete_productos\producto;
use App\Models\Paquete_Ventas\cotizacion;
use App\Models\Paquete_Ventas\venta;

class Ventas extends Component
{
    public $count = 0;
    
    public function render()
    {
        return view('livewire.paquete-ventas.venta.listar-ventas',[
            'ventas' => $this->getVentas()
        ]);
    }

    public function getCotizacion($id){
        return cotizacion::find($id);
    }

    public function getVentas(){
        return venta::all();
    }

    public function deleteVenta($id){
        $venta = venta::find($id);
        if ($venta) {
            $venta->delete();
        }
    }

    public function gotoDetalle($cotizacionId){
        redirect()->route('detalle.cotizacion', ['cotizacionId' => $cotizacionId]);
    }

    public function getProductInfo($id){
        return producto::find($id);
    }
}
