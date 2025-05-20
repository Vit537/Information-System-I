<?php

namespace App\Models\AuditLog;

use Illuminate\Database\Eloquent\Model;
use App\Models\Paquete_Usuarios\Auth\persona;

class personaActi extends Model
{
    protected $table='persona_actividades';
      protected $fillable = [
        'persona_id',
        'event_type',
        'event_name',
        'metadata',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'metadata' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(persona::class, 'persona_id');
    }
}
