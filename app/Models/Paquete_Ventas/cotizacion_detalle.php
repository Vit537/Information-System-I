<?php

namespace App\Models\Paquete_Ventas;

use Illuminate\Database\Eloquent\Model;
use App\Models\Paquete_Ventas\cotizacion;
use App\Models\Paquete_productos\producto;

class cotizacion_detalle extends Model
{
    protected $table="cotizacion_detalle";

    protected $fillable = [
        'cotizacion_id',
        'producto_id',
        'cantidad',
        'precio_total'
    ];

    public function cotizacion(){
        return $this->belongsTo(cotizacion::class, 'cotizacion_id', 'id');
    }

    public function producto(){
        return $this->belongsTo(producto::class, 'producto_id', 'id');
    }
}
