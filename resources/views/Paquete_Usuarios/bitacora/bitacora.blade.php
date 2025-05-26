{{-- articles/index.blade.php --}}

@extends('layouts.dashboard')


@section('content')


    <h1 class="text-center font-bold text-white text-4xl">BITACORA</h1>
    <div class=" h-1/2 px-10  w-full
    flex justify-center ">

        <div class="space-x-10  py-10">
            <a class="px-6 py-3 bg-indigo-500 text-white rounded-xl hover:bg-violetSoft transition-colors duration-300" href="{{ route('listar.accion.cuenta')}}">
                Lista CRUD
            </a>

            <a class="px-6 py-3 bg-indigo-500 text-white rounded-xl hover:bg-violetSoft transition-colors duration-300" href="{{ route('listar.eventos.cuenta')}}">
                Lista Eventos
            </a>
        </div>

    </div>
    {{-- <div class="px-10 ">



    </div> --}}
@endsection
