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

    //search and filter

    public $busqueda = '';
    public $precio_min;
    public $precio_max;
    public $fecha_inicio;
    public $fecha_fin;
    public $orden = 'asc'; // asc o desc

    public function render()
    {


        return view('livewire.PaqueteCompras.nota-compra', [
            'proveedores' =>  $this->getProveedor()
        ]);
    }

    public function getProveedor()
    {
        $ordenes = ordenCompra::with('proveedor.persona');


        /////
        // if ($this->precio_min !== null) {
        //     $query->where('precio', '>=', $this->precio_min);
        // }

        // if ($this->precio_max !== null) {
        //     $query->where('precio', '<=', $this->precio_max);
        // }

         if ($this->fecha_inicio) {
             $ordenes->whereDate('created_at', '>=', $this->fecha_inicio);
         }

         if ($this->fecha_fin) {
             $ordenes->whereDate('created_at', '<=', $this->fecha_fin);
         }

        // Ordenar por precio
         $ordenes->orderBy('created_at', $this->orden);


        if ($this->busqueda !== '') {
            //     $proveedores = Persona::where('nombre', 'ILIKE', '%' . $this->busqueda . '%')->get();
            //   dd('entro aqui');
            //  $ordenes = OrdenCompra::whereHas('proveedor.persona', function ($query) {
            //      $query->where('nombre', 'ILIKE', '%' . $this->busqueda . '%');
            //  });
            $ordenes->whereHas('proveedor.persona', function ($q) {
                $q->where('nombre', 'ILIKE', '%' . $this->busqueda . '%');
            });
        }

        return $ordenes->get();

        // return ordenCompra::with('proveedor.persona')->get();
    }


    public function deleteCompra($id)
    {
        $compra = ordenCompra::find($id);
        if ($compra) {

            //  $this->mensaje = 'Elemento eliminado correctamente.' ;
            $compra->delete();

             $this->dispatch('mensaje', 'Compra eliminada correctamente.');
            // $this->js("window.dispatchEvent(new CustomEvent('descargar-pdf'))");

        }
    }
}





//  {{-- <div wire:loading class="text-gray-500 bg-white">
//             Cargando resultados...
//         </div> --}}
