<?php

namespace App\Livewire\PaqueteCompras;

use Livewire\Component;
// use App\Models\Paquete_Usuarios\proveedor;
use App\Models\Paquete_compra\ordenCompra;
use Livewire\Attributes\On;

class NotaCompra extends Component
{
    public $datos = [];
    public $mensaje = null;

    public $modoEdicion = false;
    public $item_id;
    public $nombre;
    public $correo;

    public function render()
    {


        return view('livewire.PaqueteCompras.nota-compra', [
            'proveedores' => $this->getProveedor()
        ]);
    }

    public function getProveedor()
    {
        return ordenCompra::with('proveedor.persona')->get();

        //   dd($datos);
        // // return proveedor::with('persona')->get();
        // return null;
        // return proveedor::all();

        // $proveedor = proveedor::where('persona_id','datos->proveedor_id')->get();
    }

    public function deleteCompra($id)
    {
        $compra = ordenCompra::find($id);
        if ($compra) {
            // $this->mensaje=null;
            //  $this->mensaje = 'Elemento eliminado correctamente.' ;
            $compra->delete();
            // $this->mensaje = null;
            $this->dispatch('mensaje', 'Compra eliminada correctamente.');
        }
    }




}
