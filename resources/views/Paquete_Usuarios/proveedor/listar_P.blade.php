{{-- articles/index.blade.php --}}

@extends('layouts.dashboard')


@section('content')
    @if (session('success'))
        <x-flash-message :message="session('success')" type="success" />
    @endif

    @if (session('error'))
        <x-flash-message :message="session('error')" type="error" />
    @endif
    <div class="px-10">
        <div class="flex justify-between py-2">
            <div>
                <a href="{{ route('register.proveedor') }}"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Crear proveedor
                </a>

            </div>

        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
            <table
                class="w-full text-sm text-left text-gray-800 dark:text-gray-300 border-collapse bg-white dark:bg-gray-800">
                <thead class="text-xs text-black uppercase bg-slate-400 dark:bg-slate-600">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Correo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Direccion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Telefono
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tipo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Accion
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- contenido --}}
                    @foreach ($usuarios as $usuario)
                        <tr>

                            <td class="border border-gray-300 dark:border-gray-600">{{ $usuario->nombre }}</td>
                            <td class="border border-gray-300 dark:border-gray-600">{{ $usuario->correo }}</td>
                            <td class="border border-gray-300 dark:border-gray-600">{{ $usuario->direccion }}</td>
                            <td class="border border-gray-300 dark:border-gray-600">{{ $usuario->telefono }}</td>
                            <td class="border border-gray-300 dark:border-gray-600">{{ $usuario->tipo }}</td>
                            {{-- <td>{{ $usuario->updated_at->format('y-m-d') }}</td> --}}
                            <td>
                                <div class="flex space-x-2">
                                    {{-- <a href="{{ route('articles.edit', [$article->id]) }}" --}}
                                    <a href="{{ route('persona.edit', [$usuario->id]) }}"
                                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    {{-- @if (auth()->user()->tipo === 'proveedor')

                                        {{-- <a href="{{ route('articles.audit', $article)}}" title="ver auditoria"
                                        <a href="#" title="ver auditoria"
                                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endif --}}
                                    {{-- <form action="{{route('articles.destroy', $article)}}" method="POST"> --}}
                                    <form action="{{ route('persona.destroy', $usuario) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>


                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>

    </div>
@endsection
