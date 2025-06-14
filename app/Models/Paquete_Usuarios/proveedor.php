<?php

namespace App\Models\Paquete_Usuarios;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\Paquete_Usuarios\Auth\Persona;
use App\Models\Paquete_compra\ordenCompra;

class proveedor extends Model
{
    //
    use HasFactory, Notifiable;

    protected $table="proveedor";


    protected $primaryKey = 'persona_id'; // Indica que la PK es persona_id
    public $incrementing = false; // ¡Crucial! Indica que no es autoincremental

    protected $fillable=[
        'persona_id',
        'fecha_registro'

    ];

    public function Persona(){
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function ordenCompra(){
        return $this->hasMany(ordenCompra::class, 'persona_id');
    }
}
