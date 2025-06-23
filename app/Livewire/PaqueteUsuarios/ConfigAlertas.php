<?php

namespace App\Livewire\PaqueteUsuarios;

use Livewire\Component;
use App\Models\Paquete_Usuarios\configuracionAlertas;
use Illuminate\Support\Facades\Auth;

class ConfigAlertas extends Component
{
    public $configuaracion;

    public function mount(){
        $this->configuaracion = configuracionAlertas::find(Auth::user()->id);
        if(!$this->configuaracion){
            configuracionAlertas::create([
                'persona_id' => Auth::user()->id
            ]);
            $this->configuaracion = configuracionAlertas::find(Auth::user()->id);
        }
    }

    public function render()
    {
        return view('livewire.paquete-usuarios.configuracion-alertas');
    }

    public function getConfig($type){
        if($type == 'venta'){
            return $this->configuaracion->notificar_venta ? 'true': 'false';
        }else if($type == 'producto'){
            return $this->configuaracion->notificar_producto ? 'true': 'false';
        }else if($type == 'categoria'){
            return $this->configuaracion->notificar_categoria ? 'true': 'false';
        }
    }

    public function confirm($type){
        if($type == 'venta'){
            $this->configuaracion->notificar_venta = !$this->configuaracion->notificar_venta;
        }else if($type == 'producto'){
            $this->configuaracion->notificar_producto = !$this->configuaracion->notificar_producto;
        }else if($type == 'categoria'){
            $this->configuaracion->notificar_categoria = !$this->configuaracion->notificar_categoria;
        }
        $this->configuaracion->save();
    }
}
