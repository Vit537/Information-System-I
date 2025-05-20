<?php

namespace App\Http\Controllers\Paquete_Usuarios\Auth;

use App\Models\Paquete_Usuarios\User;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**php artisan make:controller Paquete_Usuarios/PersonaController --resource --model=App\Models\Paquete_Usuarios\Persona
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function register(){

        return view('auth.register');
    }

    public function registerVerify(Request $request){
        // dd($request->all());
        $request->validate([
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:4',
            'password_confirmation' => 'required|same:password'
        ],[
            'email.required ' => 'El email es requerido',
            'email.unique ' => 'El email ya existe'
        ] );


        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('login')->with('success', 'usuario creado correctamente');
    }

    public function login(){
        return view('auth.login');
    }

    public function loginVerify(Request $request){
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',

        ],[
            'email.required ' => 'El email es requerido',
            'email.unique ' => 'El email ya existe'
        ] );


            // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            //     return dd('Hola mundo');
            // }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['invalid_Credentials'=> 'user o password invalid'])->withInput();
    }

    public function signOut(){
        Auth::logout();
        return redirect()->Route('login')->with('success', 'session cerrada correctamente');
    }

}







//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(User $user)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(User $user)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, User $user)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(User $user)
//     {
//         //
//     }
// }
