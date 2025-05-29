<?php

namespace App\Livewire\PaqueteVentas;

use Livewire\Component;
use App\Models\Paquete_productos\producto;
use App\Models\Paquete_Ventas\cotizacion;
use App\Models\Paquete_Ventas\cotizacion_detalle;
use App\Models\Paquete_Ventas\venta;
use Illuminate\Support\Facades\Auth;

class CotizacionVenta extends Component
{
    public $cotizaciones;

    public function render()
    {
        return view('livewire.paquete-ventas.venta.crear-venta');
    }

    public function mount()
    {
        $this->cotizaciones = cotizacion::all();
    }

    public function getDetalle($id){
        return cotizacion_detalle::where('cotizacion_id', $id)->get();
    }

    public function confirm($id)
    {
        venta::create([
            'cotizacion_id' => $id,
            'estado' => 'pago incompleto'
        ]);
        redirect('venta/listarVentas');
    }
}
