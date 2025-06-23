<?php

namespace App\Http\Controllers\Paquete_Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paquete_Usuarios\proveedor;
use App\Models\Paquete_Usuarios\Auth\Persona;

class proveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function register(){

        return view('Paquete_Usuarios.proveedor.register');
    }

    public function registerVerify(Request $request){

        $request->validate([
            'correo' => 'required|unique:persona,correo|email',
            'telefono' => ['required', 'regex:/^\+?[0-9\s\-\(\)]+$/', 'max:20'],
            'direccion' => 'required|string|max:255'
        ],[
            'correo.required' => 'El correo es requerido',
            'correo.unique' => 'El correo ya existe',
            'correo.email' => 'El formato del correo no es válido',

            'telefono.required' => 'El teléfono es obligatorio',
            'telefono.numeric' => 'El teléfono debe ser numérico',
            'telefono.digits_between' => 'El teléfono debe tener entre 8 y 15 dígitos',

            'direccion.required' => 'La dirección es obligatoria',
            'direccion.max' => 'La dirección no puede tener más de 255 caracteres',
        ]);


        $persona = Persona::create([
            'correo' => $request->correo,
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'tipo' => $request->tipo
        ]);


        proveedor::create([
            'persona_id' => $persona->id,
            'fecha_registro' => $request->registro,
        ]);

        return redirect()->route('listar.usuarios')->with('success', 'proveedor creado correctamente');
    }

       public function listarProveedor()
    {
        $usuarios = Persona::where('tipo','proveedor')->get(); // o auth()->user();
        return view('Paquete_Usuarios.proveedor.listar_P', compact('usuarios'));
    }
}
