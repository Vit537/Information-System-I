<?php

namespace App\Livewire\PaqueteCompras;

use Livewire\Component;
use App\Models\Paquete_Usuarios\Auth\persona;
use App\Models\Paquete_productos\producto;
use  App\Models\Paquete_Usuarios\proveedor;
use  App\Models\Paquete_compra\ordenCompra;
use Illuminate\Support\Facades\Auth;

class AddNotaCompra extends Component
{
    public $products = [];
    public $proveedores = [];
    public $prov_id = null;
    public $cart = [];
    public $total = 0;


    public function render()
    {
        return view('livewire.PaqueteCompras.add-nota-compra');
    }

    public function mount()
    {

        $this->proveedores = proveedor::with('persona')->get();

        $this->products = producto::all();
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
            }
        }
    }

    public function getCartWithDetails()
    {
        return collect($this->cart)->map(function ($item) {
            [$productId, $quantity] = $item;
            $product = collect($this->products)->firstWhere('id', $productId);
            return [
                'product' => $product,
                'quantity' => $quantity,
                'subtotal' => $product ? $product->precio * $quantity : 0
            ];
        });
    }



    public function confirm()
    {
        $orden = ordenCompra::create([
            'fecha' => now(),
            'administrador_id' => Auth::user()->id,
            'proveedor_id' => $this->prov_id,
            //  'empleado_id' => Auth::user()->id
        ]);
        $lista = $this->getCartWithDetails();
        foreach ($lista as $item) {
            //  dd($item);

             $orden->productos()->attach($item['product']->id, [
                 'cantidad' => $item['quantity'],
                 'precio_unitario' => $item['product']->precio,
                 'precio_total' => $item['subtotal']
             ]);
         }
        $this->cart = [];
        $this->total = 0;
        // redirect('nota-compra');
        // return redirect()->route('nota.compra')->with('status', '¡Compra realizada correctamente!');
        session()->flash('mensaje', 'Se creo una nueva orden.');
        return redirect()->route('nota.compra');
    }
}


 // $this->proveedores = proveedor::with('persona')->first();
