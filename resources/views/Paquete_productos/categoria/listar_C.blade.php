{{-- articles/index.blade.php --}}

@extends('layouts.dashboard')


@section('content')
    <div class="px-10">
        <div class="flex justify-between py-2">
            <div>
                <a href="{{ route( 'register.categoria')}}"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Crear categoria
                </a>

            </div>

        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
            <table class="w-full text-sm text-left text-gray-800 dark:text-gray-300 border-collapse bg-white dark:bg-gray-800">
                <thead class="text-xs text-black uppercase bg-slate-400 dark:bg-slate-600">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Descripcion
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Categoria
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Accion
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- contenido --}}
                    @foreach ($categorias as $categoria)
                        <tr>

<<<<<<< HEAD

=======
>>>>>>> 5a265721a20daab403fd0abfebf8148c031925db
                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">{{ $categoria->nombre }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">{{ $categoria->descripcion }}</td>


<<<<<<< HEAD



=======
>>>>>>> 5a265721a20daab403fd0abfebf8148c031925db
                            <td class="border border-gray-300 dark:border-gray-600">{{ $categoria->categoriaPadre->nombre ?? 'sin categoria' }}</td>
                            <td >
                                <div class="flex space-x-2">
                                    {{-- <a href="{{ route('articles.edit', [$article->id]) }}" --}}
                                    <a href="{{ route('categoria.edit', [$categoria->id]) }}"
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
                                    <form action="{{ route('categoria.destroy', $categoria) }}" method="POST">
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
