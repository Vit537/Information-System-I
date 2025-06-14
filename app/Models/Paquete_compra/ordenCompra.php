<?php

namespace App\Models\Paquete_compra;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paquete_Usuarios\Auth\persona;
use App\Models\Paquete_productos\producto;
use App\Models\Paquete_Usuarios\proveedor;

class ordenCompra extends Model
{
    use HasFactory;
    protected $name = 'ordenCompra';

    protected $fillable = [
        'fecha',
        'administrador_id',
        'proveedor_id',
    ];

    public function persona()
    {
        return $this->belongsTo(persona::class, 'id');
    }

    public function proveedor()
    {
        return $this->belongsTo(proveedor::class, 'proveedor_id');
    }

    public function productos()
    {
        return $this->belongsToMany(producto::class, 'orden_compras_producto' , 'orden_compra_id','producto_id'  )
            ->withPivot('cantidad', 'precio_unitario' , 'precio_total')
            ->withTimestamps();
    }
}
