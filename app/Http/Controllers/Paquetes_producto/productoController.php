<?php

namespace App\Http\Controllers\Paquetes_producto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paquete_productos\producto;

class productoController extends Controller
{
    //

    public function register1(){

        return view('Paquete_productos.register');
    }

    public function registerVerify1(Request $request){


        producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'precio' => $request->precio,

        ]);

        return redirect()->route('dashboard')->with('success', 'producto creado correctamente');
    }


}
