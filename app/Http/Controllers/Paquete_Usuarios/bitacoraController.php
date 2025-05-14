<?php

namespace App\Http\Controllers\Paquete_Usuarios;

use App\Http\Controllers\Controller;
use App\Models\AuditLog\Bitacora;
use Illuminate\Http\Request;

class bitacoraController extends Controller
{
    public function listarBitacora(){
        $logins = Bitacora::all();
        return view('Paquete_Usuarios.bitacora', compact('logins'));    
    }
}
