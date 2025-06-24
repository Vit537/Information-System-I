<?php

namespace App\Livewire\PaqueteCompras;

use Livewire\Component;

use App\Models\Paquete_Usuarios\Auth\persona;
use App\Models\Paquete_productos\producto;
use  App\Models\Paquete_Usuarios\proveedor;
use  App\Models\Paquete_compra\ordenCompra;
use Illuminate\Support\Facades\Auth;

class Pruebas extends Component
{
    public $products = [];
    public $proveedores = [];
    public $proveedorCompra;
    public $productosCompra;
    public $prov_id = null;
    public $cart = [];
    public $total = 0;


    public $compra_id;


    public function render()
    {

        return view('livewire.PaqueteCompras.pruebas');
    }




}


//     public function actualizar()
    // {
    //     $this->validate([
    //         'nombre' => 'required|string|max:255',
    //         'correo' => 'required|email',
    //     ]);

    //     $item = Persona::find($this->item_id);

    //     if ($item) {
    //         $item->update([
    //             'nombre' => $this->nombre,
    //             'correo' => $this->correo,
    //         ]);

    //         $this->reset(['nombre', 'correo', 'item_id', 'modoEdicion']);
    //         $this->dispatch('mensaje', '¡Actualizado correctamente!');
    //     }
    // }





    // public function render()
    // {
    //     return view('livewire.PaqueteCompras.add-nota-compra');
    // }


