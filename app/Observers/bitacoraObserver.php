<?php

namespace App\Observers;

use App\Models\AuditLog\bitacora;
use Illuminate\Support\Facades\Auth;
use App\Mail\AlertasMail;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Agent\Agent;
use App\Models\Paquete_Usuarios\configuracionAlertas;

class bitacoraObserver
{
    //
    public function created($model)
    {
        $this->registerActivity($model, 'created');
        $body = $this->generateDescription($model, 'created');
        $this->sendMail($model, $body);
    }

    public function updated($model)
    {
        $this->registerActivity($model, 'updated');
        $body = $this->generateDescription($model, 'updated');
        $this->sendMail($model, $body);
    }

    public function deleted($model)
    {
        $this->registerActivity($model, 'deleted');
        $body = $this->generateDescription($model, 'deleted');
        $this->sendMail($model, $body);
    }

    public function restored($model)
    {
        $this->registerActivity($model, 'restored');
        $body = $this->generateDescription($model, 'restored');
        $this->sendMail($model, $body);
    }

    public function forceDeleted($model)
    {
        $this->registerActivity($model, 'force_deleted');
        $body = $this->generateDescription($model, 'force_deleted');
        $this->sendMail($model, $body);
    }

    protected function registerActivity($model, $event)
    {
        $agent = new Agent();

        $description = $this->generateDescription($model, $event);

        Bitacora::create([
            'ip_address' => request()->ip(),
            'browser' => $agent->browser(),
            'event_time' => now(),
            'event' => $event,
            'description' => $description,
            'device' => $agent->deviceType(),
            'loggable_id' => $model->id,
            'loggable_type' => get_class($model),
            'persona_id' => Auth::id() ?? null,
        ]);
    }

    protected function generateDescription($model, $event)
    {
        $modelName = class_basename($model);

        switch ($event) {
            case 'created':
                return "Nuevo {$modelName} creado";
            case 'updated':
                $changes = json_encode($model->getChanges());
                return "{$modelName} actualizado. Cambios: {$changes}";
            case 'deleted':
                return "{$modelName} eliminado";
            case 'restored':
                return "{$modelName} restaurado";
            case 'force_deleted':
                return "{$modelName} eliminado permanentemente";
            default:
                return "Acción {$event} realizada en {$modelName}";
        }
    }

    protected function sendMail($model, $body){
        $modelName = class_basename($model);
        $config = configuracionAlertas::find(Auth::user()->id);
        if(!$config){
            configuracionAlertas::create([
                'persona_id' => Auth::user()->id
            ]);
            if(in_array($modelName, ['producto','categoria','venta'])){
                Mail::to(Auth::user()->correo)->send(new AlertasMail('Nuevo Evento', $body));
            }
        }else{
            switch($modelName){
                case 'venta':
                    if($config->notificar_venta){
                        Mail::to(Auth::user()->correo)->send(new AlertasMail('Nuevo Evento', $body));
                    }
                    return;
                case 'producto':
                    if($config->notificar_producto){
                        Mail::to(Auth::user()->correo)->send(new AlertasMail('Nuevo Evento', $body));
                    }
                    return;
                case 'categoria':
                    if($config->notificar_categoria){
                        Mail::to(Auth::user()->correo)->send(new AlertasMail('Nuevo Evento', $body));
                    }
                    return;
                default:
                    return;
            }
        }
    }

// // Obtener todos los inicios de sesión de un usuario
// $logins = Bitacora::where('event_type', 'auth')
//             ->where('event', 'login')
//             ->where('user_id', $userId)
//             ->get();

// // Obtener actividad completa (modelos + auth)
// $activity = Bitacora::with(['user', 'loggable'])
//               ->orderBy('event_time', 'desc')
//               ->paginate(20);

// // Tiempos de sesión (ejemplo avanzado)
// $sessions = Bitacora::selectRaw('
//         user_id,
//         MAX(CASE WHEN event = "login" THEN event_time END) as login_time,
//         MAX(CASE WHEN event = "logout" THEN event_time END) as logout_time
//     ')
//     ->where('event_type', 'auth')
//     ->groupBy('user_id')
//     ->get();

}
