<?php

namespace App\Models\Paquete_Ventas;

use Illuminate\Database\Eloquent\Model;
use App\Models\Paquete_Usuarios\Cliente;
use App\Models\Paquete_Usuarios\Usuario;

class cotizacion extends Model
{
    protected $table="cotizacion";

    protected $fillable = [
        'empleado_id',
        'cliente_id',
        'monto_total'
    ];

     public function cliente(){
        return $this->belongsTo(cliente::class, 'cliente_id', 'persona_id');
    }

    public function empleado(){
        return $this->belongsTo(usuario::class, 'empleado_id', 'persona_id');
    }
}
