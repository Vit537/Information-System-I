<?php

namespace App\Livewire\PaqueteVentas;

use Livewire\Component;
use App\Models\Paquete_Ventas\cotizacion_detalle;
use App\Models\Paquete_productos\producto;
use App\Models\Paquete_Ventas\cotizacion;
use App\Models\Paquete_Ventas\venta;
use Illuminate\Support\Facades\Auth;

class DevolucionCancelacion extends Component
{
    public $ventaID = 0;
    public $total = 0;
    public $detalle;
    public $devolver = [];
    
    public function mount($ventaID)
    {
        $this->ventaID = $ventaID;
        $venta = venta::find($ventaID);
        $this->detalle = cotizacion_detalle::where('cotizacion_id', $venta->cotizacion_id)->get();
    }

    public function render()
    {
        return view('livewire.paquete-ventas.venta.devolucion-cancelacion');
    }

    public function getProductInfo($id){
        return producto::find($id);
    }

    public function updateTotal($detalleId){
        $cotizacion = cotizacion_detalle::find($detalleId);
        $this->devolver[] = $cotizacion;
        $this->total += $cotizacion->precio_total;
        $this->detalle = $this->detalle->reject(function ($item) use ($detalleId) {
            return $item->id == $detalleId;
        })->values();
    }

    public function confirmDevolution(){
        foreach($this->devolver as $cotizacion){
            $product = $this->getProductInfo($cotizacion->producto_id);
            $product->stock += $cotizacion->cantidad; 
            $product->save();
        }
        $total = 0;
        $venta = venta::find($this->ventaID);
        cotizacion::create([
            'monto_total' => $total,
            'cliente_id' => cotizacion::find($venta->cotizacion_id)->cliente_id,
            'empleado_id' => Auth::user()->id
        ]);
        $cotizacion_id = cotizacion::max('id');
        $venta->cotizacion_id = $cotizacion_id;
        $venta->save();
        foreach($this->detalle as $cotizacion){
            cotizacion_detalle::create([
                'cotizacion_id' => $cotizacion_id,
                'producto_id' => $cotizacion->producto_id,
                'cantidad' => $cotizacion->cantidad,
                'precio_total' => $cotizacion->precio_total
            ]);
            $total += $cotizacion->precio_total;
        }
        $cotizacion = cotizacion::find($cotizacion_id);
        $cotizacion->monto_total = $total;
        $cotizacion->save();
        redirect()->route('gestionar.devoluciones', ['evento' => 'devolucion']);
    }

    public function deleteVenta(){
        foreach($this->detalle as $cotizacion){
            $product = $this->getProductInfo($cotizacion->producto_id);
            $product->stock += $cotizacion->cantidad; 
            $product->save();
        }
        $venta = venta::find($this->ventaID);
        $venta->delete();
    }
}
