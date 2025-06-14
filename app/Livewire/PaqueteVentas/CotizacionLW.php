<?php

namespace App\Livewire\PaqueteVentas;

use Livewire\Component;
use App\Models\Paquete_productos\producto;
use App\Models\Paquete_Ventas\cotizacion;
use App\Models\Paquete_Usuarios\Auth\Persona;

use function PHPUnit\Framework\isNull;

class CotizacionLW extends Component
{
    public $count = 0;
    public $cliente_id = null;
    public $empleado_id = null;
    public $monto_min = 0;
    public $monto_max = PHP_INT_MAX;
    public $clientes;
    public $empleados;
    
    public function render()
    {
        return view('livewire.paquete-ventas.cotizacion.cotizacion');
    }

    public function mount(){
        $this->clientes = persona::where('tipo', 'cliente')->get();
        $this->empleados = persona::where('tipo','usuario')->orWhere('tipo','administrador')->get();
    }

    public function getCotizaciones(){
        $cotizaciones = cotizacion::all();
        if($this->cliente_id){
            $cotizaciones = $cotizaciones->where('cliente_id', $this->cliente_id);
        }
        if($this->empleado_id){
            $cotizaciones = $cotizaciones->where('empleado_id', $this->empleado_id);
        }
        if($this->monto_min){
            $cotizaciones = $cotizaciones->where('monto_total', '>=', $this->monto_min);
        }
        if($this->monto_max){
            $cotizaciones = $cotizaciones->where('monto_total', '<=', $this->monto_max);
        }
        return $cotizaciones;
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
