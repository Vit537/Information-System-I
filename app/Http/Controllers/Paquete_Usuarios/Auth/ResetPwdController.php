<?php

namespace App\Http\Controllers\Paquete_Usuarios\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPwdController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/home';

    public function __construct()
    {

        $this->middleware('guest');
    }

    // Sobrescribe el método para usar tu campo 'correo' en lugar de 'email'
    protected function credentials(Request $request)
    {
        return $request->only(
            'correo', 'password', 'password_confirmation', 'token'
        );
    }

    // Sobrescribe el método para usar tu campo 'contrasena'
    protected function resetPassword($user, $password)
    {
        $user->contrasena = bcrypt($password);
        $user->save();
    }
}
