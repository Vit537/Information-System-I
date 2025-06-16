<?php

namespace App\Livewire\PaqueteVentas\PagosStripe;

use Livewire\Component;



use App\Models\Paquete_Usuarios\Auth\persona;
use App\Models\Paquete_productos\producto;
use  App\Models\Paquete_Usuarios\proveedor;
use  App\Models\Paquete_compra\ordenCompra;
use Illuminate\Support\Facades\Auth;

class MostrarProductos extends Component
{
        public $products = [];
    public $proveedores = [];
    public $proveedorCompra;
    public $productosCompra;
    public $prov_id = null;
    public $cart = [];
    public $total = 0;


    public $coti_id;
    public function render()
    {
        // dd('llego aquie');
        return view('livewire.paquete-ventas.PagoStripe.mostrar-productos');
        // return view('livewire.paquete_ventas.PagoStripe.mostrar-productos');
        // resources\views\livewire\paquete-ventas\PagoStripe\mostrar-productos.blade.php
    }

    //     public function mount($coti_id)
    // {
    //     // dd('coti_id');
    //     $this->coti_id = $coti_id;
    //     // $this->compras = ordenCompra::with('proveedor.persona')->where('id',$compra_id)->get();
    //     $this->productosCompra = ordenCompra::with('productos')->find($coti_id);
    //     //  dd($this->productosCompra);
    //     $this->proveedorCompra = ordenCompra::with('proveedor.persona')->find($coti_id);
    //     //    dd($this->proveedorCompra);



    //     //  hasta aqui obtengo el id
    //     $this->proveedores = proveedor::with('persona')->get();


    //     $this->products = producto::all();
    //      $this->rellenarCart();
    // }



    // public function addToCart($productId)
    // {
    //     $index = collect($this->cart)->search(function ($item) use ($productId) {
    //         return $item[0] === $productId;
    //     });

    //     if ($index !== false) {
    //         $this->cart[$index][1]++;
    //     } else {
    //         $this->cart[] = [$productId, 1];
    //     }

    //     $this->calculateTotal();
    // }

    // public function removeFromCart($index)
    // {
    //     if (isset($this->cart[$index])) {
    //         unset($this->cart[$index]);
    //         $this->cart = array_values($this->cart); // Reindex array
    //         $this->calculateTotal();
    //     }
    // }

    // public function calculateTotal()
    // {
    //     $this->total = 0;

    //     foreach ($this->cart as [$productId, $quantity]) {
    //         $product = collect($this->products)->firstWhere('id', $productId);
    //         if ($product) {
    //             $this->total += $product->precio * $quantity;
    //         }
    //     }
    // }

    // public function getCartWithDetails()
    // {

    //     return collect($this->cart)->map(function ($item) {
    //         [$productId, $quantity] = $item;
    //         $product = collect($this->products)->firstWhere('id', $productId);
    //         return [
    //             'product' => $product,
    //             'quantity' => $quantity,
    //             'subtotal' => $product ? $product->precio * $quantity : 0
    //         ];
    //     });
    // }

    //     public function rellenarCart()
    // {

    //     foreach ($this->productosCompra->productos as $producto) {





    //         for ($i = 0; $i < $producto->pivot->cantidad; $i++) {
    //             // Código que se repite
    //             $this->addToCart($producto->id);
    //         }


    //     }
    //     // $lista = $this->getCartWithDetails();
    //     // dd($lista);
    //     // $this->total += $producto->precio * $producto->pivot->cantidad;

    // }

    // public function updateCompra()
    // {
    //     $orden = ordenCompra::find($this->compra_id);

    //     if (!$orden) {
    //         // Manejar error si no se encuentra
    //         return;
    //     }

    //     // Limpia los productos anteriores
    //       $orden->productos()->detach();

    //     // Vuelve a adjuntar los nuevos productos con datos actualizados
    //      $lista = $this->getCartWithDetails();

    //     foreach ($lista as $item) {
    //         $orden->productos()->attach($item['product']->id, [
    //             'cantidad' => $item['quantity'],
    //              'precio_unitario' => $item['product']->precio,
    //              'precio_total' => $item['subtotal']
    //         ]);
    //     }


    //     // Redirigir o mostrar mensaje
    //     //$this->dispatch('mensaje', 'Orden actualizada correctamente.');
    //      session()->flash('mensaje', 'Orden actualizada correctamente.');
    //     return redirect()->route('nota.compra');
    // }
}



// <?php

// namespace App\Livewire\PaqueteCompras;

// use Livewire\Component;


// class EditNotaCompra extends Component
// {


//     // public function mount($id)
//     // {
//     //     $this->id = $id;
//     //     // Aquí puedes buscar la compra y cargar datos si necesitas
//     //     // $this->compra = OrdenCompra::find($id);
//     // }
//     public function render()
//     {

//         return view('livewire.PaqueteCompras.edit-nota-compra');
//     }






// }
