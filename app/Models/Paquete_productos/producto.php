<?php

namespace App\Models\Paquete_productos;

use Illuminate\Database\Eloquent\Model;
use App\Models\Paquete_compra\ordenCompra;

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

      public function ordenesCompra()
    {
        return $this->belongsToMany(ordenCompra::class, 'orden_compras_producto')
              ->withPivot('cantidad', 'precio_unitario' , 'precio_total')
            ->withTimestamps();
    }


}
