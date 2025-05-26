<?php

namespace App\Http\Controllers\Paquete_Productos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paquete_productos\producto;
use App\Models\Paquete_productos\categoria;

class productoController extends Controller
{
    public function index()
    {
        //
        // if (auth()->user()->rol !== 'admin') {
        //     abort(403, 'No tienes permiso para ver esto.');
        // }
        //   @can('ver-clientes')
        //     <a href="{{ route('clientes.index') }}">Ver Clientes</a>
        // @endcan
        // para usar en la vista
    }

    public function register()
    {


        if (auth()->user()->tipo === 'administrador') {
             $categorias = categoria::all();
            return view('Paquete_productos.producto.register', compact('categorias'));
        }

        abort(403, 'No tienes permiso para crear este producto.');
    }

    public function registerVerify(Request $request)
    {

        //     $request->validate([
        //     'nombre' => 'required',
        //     'descripcion' => 'required',
        //     'imagen' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        //     'precio' => 'required|numeric',
        //     'categoria_id' => 'required|exists:categoria,id'
        // ]);


        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            // $imagen->storeAs('public/productos', $nombreImagen, 'public');
            $imagen->storeAs('productos', $nombreImagen, 'public');
        }
        producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $nombreImagen,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'stock_minimo' => $request->stock_minimo,
            'categoria_id' => $request->categoria_id
        ]);

        return redirect()->route('listar.productos')->with('success', 'producto creado correctamente');
    }

    public function listarProductos()
    {
        $productos = producto::with('categoria')->get();//cargar la relacion
        return view('Paquete_productos.producto.listar_P', compact('productos'));
    }

// modificar esto para ver solo la vista de los productos

    public function pruebaProducto()
    {

        $productos = producto::with('categoria')->get();//cargar la relacion
        return view('Paquete_productos.producto.pruebaProducto', compact('productos'));
    }
    public function tarjetaProducto($id)
    {
       $producto = producto::with('categoria')->findOrFail($id);
        // $productos = producto::with('categoria')->get();//cargar la relacion
        return view('Paquete_productos.producto.tarjeta', compact('producto'));
    }




    public function create()
    {
        return view('Paquete_Usuarios.index');
    }

    // public function store(Request $request)
    // {
    //     Article::create($request->all());
    //     return redirect()->route('articles.index');
    // }

    // public function show(Article $article)
    // {
    //     return view('articles.show', compact('article'));
    // }

    public function edit(producto $producto)
    {
        if (auth()->user()->tipo === 'administrador') {
            return view('Paquete_productos.producto.edit', compact('producto'));
        }

        abort(403, 'No tienes permiso para editar este producto.');
    }

    public function update(Request $request, producto $producto)
    {
        $producto->update($request->all());
        return redirect()->route('listar.productos');
    }

    public function destroy(producto $producto)
    {
        if (auth()->user()->tipo === 'administrador') {
            $producto->delete();
            return redirect()->route('listar.productos');
        }
        abort(403, 'No tienes permiso para eliminar este producto.');
    }
}
