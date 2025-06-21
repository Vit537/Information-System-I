<?php

namespace App\Http\Controllers\Paquete_Usuarios\get_password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;


use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class ForgotPwdController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('Paquete_Usuarios.usuario.restablecer_contrasena.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['correo' => 'required|email']);
        //  $this->validateEmail($request);

        $status = Password::sendResetLink(
            $request->only('correo')
        );


        return $status === Password::RESET_LINK_SENT
            ? $this->enviarCorreoReset($request, $status)

            : back()->withErrors(['correo' => __($status)]);


        // return $response == Password::RESET_LINK_SENT
        //  ? $this->sendResetLinkResponse($request, $response)
        //  : $this->sendResetLinkFailedResponse($request, $response);
    }

    protected function enviarCorreoReset(Request $request, $response)
    {
        return $request->wantsJson()
            ? new JsonResponse(['message' => trans($response)], 200)
            : back()->with('status', 'Te hemos enviado un mensaje a tu correo');
        // : back()->with('status', trans($response));
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            throw ValidationException::withMessages([
                'correo' => [trans($response)],
            ]);
        }

        return back()
            ->withInput($request->only('correo'))
            ->withErrors(['correo' => trans($response)]);
    }
}





// // app/Http/Controllers/Paquete_Usuarios/ForgotPasswordController.php

// namespace App\Http\Controllers\Paquete_Usuarios;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Password;

// class ForgotPasswordController extends Controller
// {

// }
