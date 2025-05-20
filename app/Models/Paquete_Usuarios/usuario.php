<?php

namespace App\Models\Paquete_Usuarios;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Paquete_Usuarios\Auth\Persona;

class usuario extends Model
{
    //


    use HasFactory, Notifiable;

    protected $table="usuario";

    protected $fillable=[
        'persona_id',
        'departamento',
        'fecha_contrato',
        'fecha_despido',
        'sueldo',

    ];

    public function Persona(){
        return $this->belongsTo(Persona::class, 'persona_id');
    }
}
