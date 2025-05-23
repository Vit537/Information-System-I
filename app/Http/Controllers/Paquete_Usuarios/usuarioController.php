<?php

namespace App\Http\Controllers\Paquete_Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paquete_Usuarios\usuario;
use App\Models\Paquete_Usuarios\Auth\Persona;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function register(){

        return view('Paquete_Usuarios.usuario_empleado.register');
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


        usuario::create([
            'persona_id' => $persona->id,
            'departamento' => $request->departamento,
            'fecha_contrato' => $request->contrato,
            'fecha_despido' => $request->despido,
            'sueldo' => $request->sueldo,
        ]);

        return redirect()->route('listar.usuarios')->with('success', 'usuario creado correctamente');
    }

}
