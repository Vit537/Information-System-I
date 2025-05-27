{{-- articles/index.blade.php --}}

@extends('layouts.dashboard')


@section('content')
    <h1 class="text-center font-bold text-white text-4xl">BITACORA</h1>
    <div class=" h-1/2 px-10  w-full
    flex justify-center ">

        <div class="  py-10 ">

            <div class="gap-5 w-full flex flex-col sm:flex-row justify-center items-center">
                <a class="px-6 py-3 bg-indigo-500 text-white w-full md:w-auto rounded-xl hover:bg-violetSoft transition-colors duration-300"
                    href="{{ route('listar.accion.cuenta') }}">
                    Lista CRUD
                </a>

                <a class="px-6 py-3 bg-indigo-500 text-white rounded-xl w-full md:w-auto hover:bg-violetSoft transition-colors duration-300"
                    href="{{ route('listar.eventos.cuenta') }}">
                    Lista Eventos
                </a>
            </div>
        </div>

    </div>
    {{-- <div class="px-10 ">



    </div> --}}
@endsection
