<?php

namespace App\Http\Controllers\Paquete_Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paquete_Usuarios\cliente;
use App\Models\Paquete_Usuarios\Auth\Persona;

class clienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function register(){

        return view('Paquete_Usuarios.cliente.register');
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


        cliente::create([
            'persona_id' => $persona->id,
            'razon_social' => $request->razon,
            'fecha_registro' => $request->registro,
            'tipo_cliente' => $request->TCliente
        ]);

        return redirect()->route('listar.clientes')->with('success', 'usuario creado correctamente');
    }

    // public function login(){
    //     return view('Paquete_Usuarios.usuario.login');
    // }

    public function listarClientes(){

        // $usuario = Auth::user(); // o auth()->user();
        $clientes = Persona::where('tipo', 'cliente')->get();// o auth()->user();
       return view('Paquete_Usuarios.cliente.listar_Clt',compact('clientes'));
    }




    // public function create()
    // {
    //     return view('Paquete_Usuarios.index');
    // }



    // public function edit(Persona $persona)
    // {

    //     return view('Paquete_Usuarios.usuario.edit', compact('persona'));
    // }

    // public function update(Request $request, Persona $persona)
    // {
    //     $persona->update($request->all());
    //     return redirect()->route('listar.usuarios');
    // }

    // public function destroy(Persona $persona)
    // {
    //     $persona->delete();
    //     return redirect()->route('listar.usuarios');
    // }





}
