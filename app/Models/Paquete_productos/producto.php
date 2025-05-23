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
        'stock',
        'stock_minimo',
        'categoria_id'
    ];

    public function categoria(){
        return $this->belongsTo(categoria::class, 'categoria_id');
    }


}
