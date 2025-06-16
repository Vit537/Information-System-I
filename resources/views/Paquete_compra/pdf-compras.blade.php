@extends('layouts.factura')

@section('print')
  <livewire:PaqueteCompras.ImprimirFactura :compra_id="$compra_id" />



@endsection
