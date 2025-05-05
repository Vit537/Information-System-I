<?php

namespace App\Models\Paquete_productos;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    //
    protected $table="producto";

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'precio',

    ];


}
