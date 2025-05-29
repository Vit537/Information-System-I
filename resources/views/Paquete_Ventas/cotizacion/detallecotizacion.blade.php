@extends('layouts.dashboard')

@section('content')
    <livewire:paquete-ventas.detalle-cotizacion :cotizacionId='$cotizacionId'>
@endsection
