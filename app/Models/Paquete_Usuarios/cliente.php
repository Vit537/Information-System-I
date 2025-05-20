<?php

namespace App\Models\Paquete_Usuarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Paquete_Usuarios\Auth\Persona;

class cliente extends Model
{
    //

    use HasFactory, Notifiable;

    protected $table="cliente";

    protected $fillable=[
        'persona_id',
        'fecha_registro',
        'razon_social',
        'tipo_cliente'
    ];

    public function Persona(){
        return $this->belongsTo(Persona::class, 'persona_id');
    }

}
