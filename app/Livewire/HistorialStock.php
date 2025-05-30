<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Paquete_productos\MovimientoStock;
use App\Models\Paquete_productos\Producto;
use Illuminate\Support\Facades\Auth;

class HistorialStock extends Component
{
    public $producto_id;
    public $fecha_inicio;
    public $fecha_fin;

    public function render()
    {
        $productos = producto::all();

        $query = MovimientoStock::query();

        if ($this->producto_id) {
            $query->where('producto_id', $this->producto_id);
        }

        if ($this->fecha_inicio) {
            $query->whereDate('created_at', '>=', $this->fecha_inicio);
        }

        if ($this->fecha_fin) {
            $query->whereDate('created_at', '<=', $this->fecha_fin);
        }

        $movimientos = $query->with(['producto', 'usuario'])->latest()->get();

        return view('livewire.historial-stock', compact('movimientos', 'productos'));
    }
}
