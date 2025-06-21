<?php

namespace App\Http\Controllers\Paquete_Usuarios\get_password;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;

class ResetPwdController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/home';



    public function __construct()
    {

        $this->middleware('guest');
    }

    public function showResetForm(Request $request, $token = null)
    {
        // dd($request);
        return view('Paquete_Usuarios.usuario.restablecer_contrasena.reset', [
            'token' => $token,
            'correo' => $request->correo
        ]);
    }




     public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'correo' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            //  $request->only('correo', 'password', 'password_confirmation', 'token'),
             $this->credentials($request),
             function ($user, $password) {
                 $user->contrasena = Hash::make($password);
                 $user->setRememberToken(Str::random(60));
                 $user->save();
             }
            //    $this->credentials($request),
            //  function ($user, $password) {
            //      $this->resetPassword($user, $password);
            //  }
        );

        return $status === Password::PASSWORD_RESET
            ? $this->confirmationReset($request, $status)
            // ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

      protected function confirmationReset(Request $request, $response)
    {
        return $request->wantsJson()
            ? new JsonResponse(['message' => trans($response)], 200)
            : redirect()->route('login')->with('status', 'Recuperacion exitosa!!');
        // : back()->with('status', trans($response));

        // redirect()->route('login')->with('status', __($status))
    }

    // $this->enviarCorreoReset($request, $status)

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


// namespace App\Http\Controllers\Paquete_Usuarios;



// class ResetPasswordController extends Controller
// {



// }

