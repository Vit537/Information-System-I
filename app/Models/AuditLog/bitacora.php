<?php

namespace App\Models\AuditLog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\Models\Paquete_Usuarios\Auth\Persona;

class bitacora extends Model
{
    //
    protected $table='bitacora';

    protected $fillable = [
        'ip_address',
        'browser',
        'event_time',
        'event_type',
        'event',
        'description',
        'device',
        'loggable_id',
        'loggable_type',
        'persona_id'
    ];

    public function loggable(){
        return $this->morphTo();
    }

    public function persona(){
        return $this->belongsTo(persona::class);
    }

    public static function registrarAuthEvent($type, $event, $persona, $description)
    {
        $agent = new \Jenssegers\Agent\Agent();

        return self::create([
            'event_type' => $type,
            'event' => $event,
            'ip_address' => request()->ip(),
            'browser' => $agent->browser(),
            'event_time' => now(),
            'description' => $description,
            'device' => $agent->deviceType(),
            'persona_id' => $persona?->id
        ]);
    }

}
