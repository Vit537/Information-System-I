<?php

namespace App\Exports;

// use App\Models\Producto;
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithHeadings;
// use Maatwebsite\Excel\Concerns\WithMapping;

// class ProductosStockExport implements FromCollection, WithHeadings, WithMapping
// {
//     protected $productos;

//     public function __construct($productos)
//     {
//         $this->productos = $productos;
//     }

//     public function collection()
//     {
//         return $this->productos;
//     }

//     public function headings(): array
//     {
//         return [
//             'ID',
//             'Nombre del Producto',
//             'Stock Actual',
//             'Stock Mínimo',
//             'Diferencia',
//             'Estado'
//         ];
//     }

//     public function map($producto): array
//     {
//         return [
//             $producto->id,
//             $producto->nombre,
//             $producto->stock,
//             $producto->stock_minimo,
//             $producto->stock_minimo - $producto->stock,
//             $producto->stock <= $producto->stock_minimo ? 'CRÍTICO' : 'NORMAL'
//         ];
//     }
// }
