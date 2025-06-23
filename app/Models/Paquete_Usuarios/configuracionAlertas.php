<?php

namespace App\Models\Paquete_Usuarios;

use Illuminate\Database\Eloquent\Model;
use App\Models\Paquete_Usuarios\Auth\Persona;

class configuracionAlertas extends Model
{
    protected $table="configuracion_alertas";

    protected $primaryKey = 'persona_id';
    public $incrementing = false;

    protected $fillable=[
        'persona_id',
        'notificar_venta',
        'notificar_producto',
        'notificar_categoria'
    ];

    public function Persona(){
        return $this->belongsTo(Persona::class, 'persona_id');
    }
}
