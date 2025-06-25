<?php

namespace App\Models\Paquete_productos;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class categoria extends Model
{
    // revisar si va esta bien hecho esto
    use HasFactory, Notifiable;

    protected $table= 'categoria';

    protected $fillable=[
        'nombre',
        'descripcion',
        'detalle',
        'categoria_padre_id'
    ];
    //   public function producto(){
    //     return $this->hasMany(producto::class);
    // }
    // nota esto es lo mismo que la funcion de abajo si no le mandas categoria_id
    // el asume que estas trabajando con categoria_id o el estandar de laraavel

    public function producto(){
        return $this->hasMany(producto::class, 'categoria_id');
    }

    public function subCategoria(){
        return $this->hasMany(categoria::class,'categoria_padre_id');
    }

    public function categoriaPadre(){
        return $this->belongsTo(categoria::class, 'categoria_padre_id');
    }


}
