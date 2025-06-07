<?php

namespace App\Http\Controllers\Paquete_Usuarios\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Paquete_Usuarios\Auth\Persona;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ActualizarCredencialesRequest;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

        return view('Paquete_Usuarios.usuario.register');
    }

    public function registerVerify(Request $request)
    {

        $request->validate([
            'correo' => 'required|unique:persona,correo|email',
            'contrasena' => 'required|min:4',
            'confirmacion_contrasena' => 'required|same:contrasena',
            'telefono' => ['required', 'regex:/^\+?[0-9\s\-\(\)]+$/', 'max:20'],
            'direccion' => 'required|string|max:255'
        ], [
            'correo.required' => 'El correo es requerido',
            'correo.unique' => 'El correo ya existe',
            'correo.email' => 'El formato del correo no es válido',

            'contrasena.required' => 'La contraseña es obligatoria',
            'contrasena.min' => 'La contraseña debe tener al menos 4 caracteres',

            'confirmacion_contrasena.required' => 'Debes confirmar la contraseña',
            'confirmacion_contrasena.same' => 'Las contraseñas no coinciden',

            'telefono.required' => 'El teléfono es obligatorio',
            'telefono.numeric' => 'El teléfono debe ser numérico',
            'telefono.digits_between' => 'El teléfono debe tener entre 8 y 15 dígitos',

            'direccion.required' => 'La dirección es obligatoria',
            'direccion.max' => 'La dirección no puede tener más de 255 caracteres',
        ]);


        Persona::create([
            'correo' => $request->correo,
            'contrasena' => bcrypt($request->contrasena),
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'tipo' => $request->tipo
        ]);

        return redirect()->route('login')->with('success', 'usuario creado correctamente');
    }

    public function login()
    {
        return view('Paquete_Usuarios.usuario.login');
    }

    // public function loginVerify(Request $request){

    //     $request->validate([
    //         'correo' => 'required|email',
    //         'contrasena' => 'required|min:4',

    //     ],[
    //         'correo.required' => 'El email es requerido',
    //         'contrasena.required' => 'La contraseña es obligatoria'
    //     ] );


    //      if (Auth::attempt(['correo' => $request->correo, 'contrasena' => $request->contrasena])) {
    //          return redirect()->route('dashboard');
    //      }

    //     return back()->withErrors(['invalid_Credentials'=> 'user o password invalid'])->withInput();
    // }

    public function loginVerify(Request $request)
    {

        $credentials = $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required'
        ]);

        if (Auth::attempt([
            'correo' => $credentials['correo'],
            'password' => $credentials['contrasena'] // ¡Clave 'password' aquí!
        ])) {
            //  $request->session()->regenerate(); // Regenera la sesión
            // return redirect()->intended('dashboard');
            return redirect()->Route('dashboard');
        }


        return back()->withErrors(['invalid_Credentials' => 'usuario invalido'])->withInput();
    }

    public function signOut()
    {
        Auth::logout();
        return redirect()->Route('login')->with('success', 'session cerrada correctamente');
    }

    public function mostrarPerfil()
    {

        $usuario = Auth::user(); // o auth()->user();

        return view('Paquete_Usuarios.usuario.perfil', compact('usuario'));
    }

    public function listarUsuarios()
    {
        $usuarios = Persona::all(); // o auth()->user();
        return view('Paquete_Usuarios.usuario.listar_U', compact('usuarios'));
    }

    public function listarEmpleados()
    {
        $empleados = Persona::all(); // o auth()->user();
        return view('Paquete_Usuarios.usuario_empleado.listar_E', compact('empleados'));
    }


    public function crearUsuarios()
    {


        if (auth()->user()->tipo === 'administrador') {
            return view('Paquete_Usuarios.crearUsuarios');
        }

        abort(403, 'No tienes permiso para crear usuarios.');
    }





    // $request->validate([
    //     'correo' => 'required|email',
    //     'contrasena' => 'required|min:4',

    // ],[
    //     'correo.required' => 'El correo es requerido',

    //     'contrasena.required' => 'La contraseña es obligatoria',

    // ]);



    // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
    //     return dd('Hola mundo');
    // }
    //dd($request->correo);
    //dd($request->contrasena);


    //    public function index()
    //     {
    //         $articles = Article::all();
    //         return view('articles.index', compact('articles'));
    //     }

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

    public function edit(Persona $persona)
    {



        if (auth()->user()->tipo === 'administrador') {
            return view('Paquete_Usuarios.usuario.edit', compact('persona'));
        }

        abort(403, 'No tienes permiso para editar usuarios.');
    }

    public function update(Request $request, Persona $persona)
    {


        $persona->update($request->all());

        return redirect()->route('listar.usuarios');
        //     $user = \App\Models\User::find(1); // Usa el ID del usuario que quieras
        //     $user->password = bcrypt('nuevacontraseña');
        //    // $user->save();
        // $contrase
        // $actualizar=requestPassword($request);
    }

    //     protected function actualizar_credenciales(Request $request, $id){
    //    $request->validate([
    //      'correo' => ['required', 'email'],
    //             'password' => ['required', 'confirmed', 'min:8'],
    //         ]);

    //         $persona = Persona::findOrFail($id);
    //         $persona->contrasena = bcrypt($request->password); // Usa el campo correcto
    //         $persona->save();


    public function actualizar_credenciales(ActualizarCredencialesRequest  $request, $id)
    {

        // dd('paso la validadcion');
        $persona = Persona::findOrFail($id);
        $cambios = [];

        // Comparar contraseña
        if (!Hash::check($request->contrasenaNueva, $persona->contrasena)) {

            $persona->contrasena = bcrypt($request->contrasenaNueva);
            $cambios[] = 'contraseña';
        }

        // Comparar correo
        if ($persona->correo !== $request->correo) {
            $persona->correo = $request->correo;
            $cambios[] = 'correo';
        }

        if (empty($cambios)) {
            return redirect()->back()->with('warning', 'No realizaste ningún cambio.');
        }

        $persona->save();

        // // Si se cambió la contraseña, enviar correo
        // if (in_array('contraseña', $cambios)) {
        //     \Mail::raw("Hola {$persona->nombre}, tu contraseña ha sido actualizada correctamente.", function ($message) use ($persona) {
        //         $message->to($persona->correo)
        //             ->subject('Tu contraseña ha sido actualizada');
        //     });

        //     \Log::info("Contraseña actualizada para persona ID {$persona->id}, correo enviado a {$persona->correo}.");
        // }

        // if (in_array('correo', $cambios)) {
        //     \Log::info("Correo actualizado para persona ID {$persona->id}, nuevo correo: {$persona->correo}.");
        // }

        return redirect()->back()->with('success', 'Datos actualizados correctamente: ' . implode(' y ', $cambios) . '.');
    }

    //     // Log::info("La persona con ID $id cambió su contraseña.");

    //     return redirect()->back()->with('success', 'Contraseña actualizada correctamente.');

    // }

    // dd('entra la validadcion');
        // $request->validate([
        //     'correo' => 'required|unique:persona,correo|email',
        //     'contrasenaActual' => 'required|min:4',
        //     'contrasenaNueva' => 'required|min:4',
        //     'confirmacion_contrasena' => 'required|same:contrasenaNueva',
        // ]);

    public function destroy(Persona $persona)
    {

        if (auth()->user()->tipo === 'administrador') {
            $persona->delete();
            return redirect()->route('listar.usuarios')->with('success', 'se elimino correctamente');
        }

        abort(403, 'No tienes permiso para eliminar usuarios.');
    }




    // public function index()
    // {
    //     $articles = Article::all();
    //     return view('articles.index', compact('articles'));
    // }

    // public function create()
    // {
    //     return view('articles.create');
    // }

    // public function store(Request $request)
    // {
    //     Article::create($request->all());
    //     return redirect()->route('articles.index');
    // }

    // public function show(Article $article)
    // {
    //     return view('articles.show', compact('article'));
    // }

    // public function edit(Article $article)
    // {
    //     return view('articles.edit', compact('article'));
    // }

    // public function update(Request $request, Article $article)
    // {
    //     $article->update($request->all());
    //     return redirect()->route('articles.index');
    // }

    // public function destroy(Article $article)
    // {
    //     $article->delete();
    //     return redirect()->route('articles.index');
    // }
}
