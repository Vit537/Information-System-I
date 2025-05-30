<?php

namespace App\Models\Paquete_productos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paquete_productos\Producto;
use App\Models\Paquete_Usuarios\Usuario;

class MovimientoStock extends Model
{
    use HasFactory;

    protected $table = 'movimientos_stock';

    protected $fillable = [
        'producto_id',
        'usuario_id',
        'tipo',
        'cantidad',
        'motivo',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
