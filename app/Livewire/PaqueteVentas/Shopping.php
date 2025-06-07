<?php

namespace App\Livewire\PaqueteVentas;

use Livewire\Component;
use App\Models\Paquete_productos\producto;
use App\Models\Paquete_Usuarios\Auth\Persona;
use App\Models\Paquete_Ventas\cotizacion;
use App\Models\Paquete_Ventas\cotizacion_detalle;
use Illuminate\Support\Facades\Auth;

class Shopping extends Component
{
    public $products = [];
    public $services = [];
    public $clientes = [];
    public $cliente_id = null;
    public $cart = [];
    public $total = 0;
    public $errorMessage;

    public function render()
    {

        return view('livewire.paquete-ventas.cotizacion.shopping');
    }

    public function mount()
    {
        $this->clientes = persona::where('tipo', 'cliente')->get();
        $this->products = producto::whereHas('categoria', function ($query) {
            $query->where('nombre', '!=', 'servicio');
        })->get();
        $this->services = producto::whereHas('categoria', function ($query) {
            $query->where('nombre', 'servicio');
        })->get();
    }

    public function addToCart($productId)
    {
        $index = collect($this->cart)->search(function ($item) use ($productId) {
            return $item[0] === $productId;
        });

        if ($index !== false) {
            $this->cart[$index][1]++;
        } else {
            $this->cart[] = [$productId, 1];
        }

        $this->calculateTotal();
    }

    public function removeFromCart($index)
    {
        if (isset($this->cart[$index])) {
            unset($this->cart[$index]);
            $this->cart = array_values($this->cart); // Reindex array
            $this->calculateTotal();
        }
    }

    public function calculateTotal()
    {
        $this->total = 0;

        foreach ($this->cart as [$productId, $quantity]) {
            $product = collect($this->products)->firstWhere('id', $productId);
            if ($product) {
                $this->total += $product->precio * $quantity;
            }else{
                $product = collect($this->services)->firstWhere('id', $productId);
                if ($product) {
                    $this->total += $product->precio * $quantity;
                }
            }
        }
    }

    public function getCartWithDetails()
    {
        return collect($this->cart)->map(function ($item) {
            [$productId, $quantity] = $item;
            $product = collect($this->products)->firstWhere('id', $productId);
            if(is_null($product)){
                $product = collect($this->services)->firstWhere('id', $productId);
            }
            return [
                'product' => $product,
                'quantity' => $quantity,
                'subtotal' => $product ? $product->precio * $quantity : 0
            ];
        });
    }

    public function confirm()
    {
        if (is_null($this->cliente_id)) {
            $this->errorMessage = 'Debe seleccionar un cliente';
            return;
        }
        cotizacion::create([
            'monto_total' => $this->total,
            'cliente_id' => $this->cliente_id,
            'empleado_id' => Auth::user()->id
        ]);
        $shopping = $this->getCartWithDetails();
        $cotizacion = cotizacion::max('id');
        foreach($shopping as $item){
            cotizacion_detalle::create([
                'cotizacion_id' => $cotizacion,
                'producto_id' => $item['product']->id,
                'cantidad' => $item['quantity'],
                'precio_total' => $item['subtotal']
            ]);
        }
        $this->cart = [];
        $this->total = 0;
        redirect('cotizacion/listarCotizaciones');
    }
}
