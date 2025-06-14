<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    //
    public function cambiarTema(Request $request)
{
    $request->validate(['theme' => 'in:light,dark']);

    $usuario = auth()->user();
    $usuario->theme = $request->input('theme');
    $usuario->save();

    return response()->json(['status' => 'ok']);
}

}
