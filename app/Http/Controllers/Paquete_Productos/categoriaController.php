<?php

namespace App\Http\Controllers\Paquete_Productos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paquete_productos\categoria;

class categoriaController extends Controller
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


         if (auth()->user()->tipo === 'administrador') {
            $categorias=categoria::all();
           return view('Paquete_productos.categoria.register', compact('categorias'));
        }
        abort(403, 'No tienes permiso para crear esta categoria.');
    }

    public function registerVerify(Request $request)
    {

        // $request->validate([
        //     'correo' => 'required|unique:persona,correo|email',
        //     'contrasena' => 'required|min:4',
        //     'confirmacion_contrasena' => 'required|same:contrasena',
        //     'telefono' => ['required', 'regex:/^\+?[0-9\s\-\(\)]+$/', 'max:20'],
        //     'direccion' => 'required|string|max:255'
        // ],[
        //     'correo.required' => 'El correo es requerido',
        //     'correo.unique' => 'El correo ya existe',
        //     'correo.email' => 'El formato del correo no es válido',

        //     'contrasena.required' => 'La contraseña es obligatoria',
        //     'contrasena.min' => 'La contraseña debe tener al menos 4 caracteres',

        //     'confirmacion_contrasena.required' => 'Debes confirmar la contraseña',
        //     'confirmacion_contrasena.same' => 'Las contraseñas no coinciden',

        //     'telefono.required' => 'El teléfono es obligatorio',
        //     'telefono.numeric' => 'El teléfono debe ser numérico',
        //     'telefono.digits_between' => 'El teléfono debe tener entre 8 y 15 dígitos',

        //     'direccion.required' => 'La dirección es obligatoria',
        //     'direccion.max' => 'La dirección no puede tener más de 255 caracteres',
        // ]);


        categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'detalle' => $request->detalle,
            'categoria_padre_id' => $request->categoria_id
        ]);

        return redirect()->route('listar.categorias')->with('success', 'categoria creada correctamente');
    }


    public function listarCategorias()
    {
        $categorias = categoria::with('categoriaPadre')->get();

        return view('Paquete_productos.categoria.listar_C', compact('categorias'));
    }


    // public function create()
    // {
    //     return view('Paquete_Usuarios.index');
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

    public function edit(categoria $categorium)
    {
        if (auth()->user()->tipo === 'administrador') {
            return view('Paquete_productos.categoria.edit', compact('categorium'));
        }

        abort(403, 'No tienes permiso para editar esta categoria.');
    }

    public function update(Request $request, categoria $categorium)
    {

        $categorium->update($request->all());
        return redirect()->route('listar.categorias');
    }

    public function destroy(categoria $categorium)
    {

        if (auth()->user()->tipo === 'administrador') {
            $categorium->delete();
            return redirect()->route('listar.categorias');
        }
        abort(403, 'No tienes permiso para eliminar esta categoria.');
    }


    // public function login(){
    //     return view('Paquete_Usuarios.usuario.login');
    // }

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

    // public function loginVerify(Request $request){

    //     $credentials = $request->validate([
    //         'correo' => 'required|email',
    //         'contrasena' => 'required'
    //     ]);

    //     if (Auth::attempt([
    //         'correo' => $credentials['correo'],
    //         'password' => $credentials['contrasena'] // ¡Clave 'password' aquí!
    //     ])) {
    //       //  $request->session()->regenerate(); // Regenera la sesión
    //        // return redirect()->intended('dashboard');
    //         return redirect()->Route('dashboard');
    //     }


    //    return back()->withErrors(['invalid_Credentials'=> 'usuario invalido'])->withInput();

    // }

    // public function signOut(){
    //     Auth::logout();
    //     return redirect()->Route('login')->with('success', 'session cerrada correctamente');
    // }

    // public function mostrarPerfil(){

    //     $usuario = Auth::user(); // o auth()->user();

    //    return view('Paquete_Usuarios.usuario.perfil',compact('usuario'));
    // }

    // public function listarUsuarios(){

    //     // $usuario = Auth::user(); // o auth()->user();
    //     $usuarios = Persona::all();// o auth()->user();
    //    return view('Paquete_Usuarios.usuario.listar_U',compact('usuarios'));
    // }

    // public function crearUsuarios(){
    //     return view('Paquete_Usuarios.crearUsuarios');
    // }



}
