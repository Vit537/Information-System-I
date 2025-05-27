<?php

namespace App\Http\Controllers\Paquete_Usuarios;

use App\Http\Controllers\Controller;
use App\Models\AuditLog\Bitacora;
use Illuminate\Http\Request;
use App\Models\AuditLog;
use App\Models\AuditLog\personaActi;

class bitacoraController extends Controller
{

    public function vistaBitacora(){

        return view('Paquete_Usuarios.bitacora.index_bitacora');
    }
    public function listarAccionCuenta(){

        // se podra ver la accion que hizo esta cuenta CRUD
        $logins = bitacora::all();
        return view('Paquete_Usuarios.bitacora.accion_cuenta', compact('logins'));
    }
    public function listarEventosCuenta(){

        // se podra ver los eventos de esta cuenta
        $actividades = personaActi::all();

        // foreach ($actividades as $actividad) {
        //  $datos = $datos+$actividad->metadata; // Aquí ya es un array
        //  // Puedes acceder así: $datos['clave']
        // }

        return view('Paquete_Usuarios.bitacora.eventos_cuenta', compact('actividades'));
    }

       // Acceder a 'metadata' de cada actividad (como array)
    // foreach ($actividades as $actividad) {
    //     $datos = $actividad->metadata; // Aquí ya es un array
    //     // Puedes acceder así: $datos['clave']
    // }

//     $actividad = PersonaActividad::first();

// $accion = $actividad->metadata['accion'];
// $navegador = $actividad->metadata['navegador'];
// $modulo = $actividad->metadata['modulo'];



//     {"ip":"127.0.0.1","device":"Desktop","platform":"Windows","browser":"Chrome","jetstream":true,"via_jetstream":true,"team_id":null}
 }
