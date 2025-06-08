@extends('layouts.dashboard')

@section('content')
    <livewire:paquete-ventas.devolucion-cancelacion :ventaID='$ventaID'>
@endsection