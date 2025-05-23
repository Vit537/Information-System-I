<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Paquete_productos\producto;
use Illuminate\Support\Facades\DB;

class ReporteStock extends Component
{
     public $tipoReporte = 'stock';

    public function render()
    {
         return view('livewire.reporte-stock', [
             'productos' => $this->getProductos()
         ]);

        // return view('Paquete_productos.producto.listar_stocks', [
        //      'productos' => $this->getProductos()
        //  ]);
    }


      protected function getProductos()
    {
        return producto::where('stock', '<=', DB::raw('stock_minimo'))->get();
// return producto::where('stock', '<=', 5)->get();
// Producto::whereRaw('(stock + pedidos_pendientes) <= stock_minimo')->get();
// $productosCriticos = Producto::whereColumn('stock', '<=', 'stock_minimo')->get();
        // return $this->tipoReporte === 'stock'
        //     ? producto::where('stock', '<=', DB::raw('stock_minimo'))->get()
        //     : producto::where('perdidas', '>', 0)->get();
    }

//     public function scopeStockCritico($query)
// {
//     return $query->whereRaw('stock <= stock_minimo');
// }
//     Producto::stockCritico()->get()

    public function cambiarReporte($tipo)
     {
         $this->tipoReporte = $tipo;
     }
}
