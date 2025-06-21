<?php

namespace App\Livewire\PaqueteVentas;

use Livewire\Component;
use App\Models\Paquete_productos\producto;
use App\Models\Paquete_Ventas\cotizacion;
use App\Models\Paquete_Ventas\venta;
use App\Models\Paquete_Usuarios\Auth\Persona;

class Ventas extends Component
{
    public $count = 0;
    public $evento;
    public $ventas;
    public $cliente_id = null;
    public $empleado_id = null;
    public $monto_min = 0;
    public $monto_max = PHP_INT_MAX;
    public $clientes;
    public $empleados;

    public function mount($evento)
    {
        $this->evento = $evento;
        $this->clientes = persona::where('tipo', 'cliente')->get();
        $this->empleados = persona::where('tipo','usuario')->orWhere('tipo','administrador')->get();
    }
    
    public function render()
    {
        return view('livewire.paquete-ventas.venta.listar-ventas',[
            'evento' => $this->evento
        ]);
    }

    public function getCotizacion($id){
        return cotizacion::find($id);
    }

    public function getVentas(){
        $ventas = venta::all();
        if ($this->cliente_id) {
            $ventas = $ventas->filter(function ($venta) {
                return $venta->cotizacion && $venta->cotizacion->cliente_id == $this->cliente_id;
            });
        }
        if ($this->empleado_id) {
            $ventas = $ventas->filter(function ($venta) {
                return $venta->cotizacion && $venta->cotizacion->empleado_id == $this->empleado_id;
            });
        }
        if ($this->monto_min) {
            $ventas = $ventas->filter(function ($venta) {
                return $venta->cotizacion && $venta->cotizacion->monto_total >= $this->monto_min;
            });
        }
        if ($this->monto_max) {
            $ventas = $ventas->filter(function ($venta) {
                return $venta->cotizacion && $venta->cotizacion->monto_total <= $this->monto_max;
            });
        }
        return $ventas;
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
