@extends('layouts.factura')

@section('print')
    {{-- <livewire:PaqueteCompras.NotaCompra > --}}
    <livewire:PaqueteCompras.ImprimirFactura :compra_id="$compra_id"/>
{{-- </livewire:PaqueteCompras.NotaCompra> --}}
    {{-- mostrar la tabla --}}
@endsection
