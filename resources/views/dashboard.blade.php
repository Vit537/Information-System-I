@extends('layouts.dashboard')

@section('content')
     <style>
        .logo-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            text-align: center;
        }

        .logo-container h1 {
            margin-top: 20px;
            font-size: 2em;
        }


    </style>

    <div class="logo-container  ">
        <h1 class="text-white dark:text-gray-900">¡Bienvenido!</h1>
    </div>
@endsection
{{-- text-white dark:text-yellow-300 --}}
