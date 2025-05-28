<?php

namespace App\Models\Paquete_Ventas;

use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    protected $table="venta";

    protected $fillable = [
        'cotizacion_id',
        'estado'
    ];

    public function cotizacion(){
        return $this->belongsTo(cotizacion::class, 'cotizacion_id', 'id');
    }
}
