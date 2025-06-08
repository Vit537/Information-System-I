<?php

namespace App\Livewire\PaqueteVentas;

use Livewire\Component;
use App\Models\Paquete_productos\producto;
use App\Models\Paquete_Ventas\cotizacion;
use App\Models\Paquete_Ventas\venta;

class Ventas extends Component
{
    public $count = 0;
    public $evento;

    public function mount($evento)
    {
        $this->evento = $evento;
    }
    
    public function render()
    {
        return view('livewire.paquete-ventas.venta.listar-ventas',[
            'ventas' => $this->getVentas(),
            'evento' => $this->evento
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

    public function gotoDevolucion($ventaID){
        redirect()->route('editar.devolucion', ['ventaID' => $ventaID]);
    }

    public function getProductInfo($id){
        return producto::find($id);
    }
}
