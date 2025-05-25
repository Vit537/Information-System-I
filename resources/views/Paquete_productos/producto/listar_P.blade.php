{{-- articles/index.blade.php --}}

@extends('layouts.dashboard')


@section('content')
    <div class="px-10">
        <div class="flex justify-between py-2">
            <div>
<<<<<<< HEAD
                <a href="{{ route('register.producto') }}"
=======
                <a href="{{ route( 'register.producto')}}"
>>>>>>> 5a265721a20daab403fd0abfebf8148c031925db
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Crear producto
                </a>

            </div>

        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
<<<<<<< HEAD
            <table
                class="w-full text-sm text-left text-gray-800 dark:text-gray-300 border-collapse bg-white dark:bg-gray-800">
                <thead class="text-xs text-black uppercase bg-slate-400 dark:bg-slate-600">
=======
            <table class="w-full text-sm text-left text-gray-800 dark:text-gray-300 border-collapse bg-white dark:bg-gray-800">
                <thead class="text-xs text-white uppercase bg-slate-400 dark:bg-slate-600">
>>>>>>> 5a265721a20daab403fd0abfebf8148c031925db
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Descripcion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Imagen
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Precio
                        </th>
                        <th scope="col" class="px-6 py-3">
<<<<<<< HEAD
                            Stock
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stock Minimo
                        </th>
                        <th scope="col" class="px-6 py-3">
=======
>>>>>>> 5a265721a20daab403fd0abfebf8148c031925db
                            Categoria
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Accion
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- contenido --}}
                    @foreach ($productos as $producto)
                        <tr>

<<<<<<< HEAD
                            <td class="border border-gray-300 dark:border-gray-600">{{ $producto->nombre }}</td>
                            <td class="border border-gray-300 dark:border-gray-600">{{ $producto->descripcion }}</td>
                            <td>
=======
                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">{{ $producto->nombre }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">{{ $producto->descripcion }}</td>
                            <td >
>>>>>>> 5a265721a20daab403fd0abfebf8148c031925db
                                @if ($producto->imagen)
                                    <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="Imagen"
                                        width="80">
                                @else
                                    <span>Sin imagen</span>
                                @endif
                            </td>
<<<<<<< HEAD
                            <td class="border border-gray-300 dark:border-gray-600">{{ $producto->precio }}</td>
                            <td class="border border-gray-300 dark:border-gray-600">{{ $producto->stock }}</td>
                            <td class="border border-gray-300 dark:border-gray-600">{{ $producto->stock_minimo }}</td>
                            <td class="border border-gray-300 dark:border-gray-600">
                                {{ $producto->categoria->nombre ?? 'sin categoria' }}</td>
=======
                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">{{ $producto->precio }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">{{ $producto->categoria->nombre ?? 'sin categoria' }}</td>
>>>>>>> 5a265721a20daab403fd0abfebf8148c031925db


                            <td>
                                <div class="flex space-x-2">
                                    {{-- <a href="{{ route('articles.edit', [$article->id]) }}" --}}
                                    <a href="{{ route('producto.edit', [$producto->id]) }}"
<<<<<<< HEAD
                                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
=======
                                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
>>>>>>> 5a265721a20daab403fd0abfebf8148c031925db
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
                                    <form action="{{ route('producto.destroy', $producto) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
<<<<<<< HEAD
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    {{-- <div class="flex items-center gap-4 bg-white px-3 py-2.5 rounded-xl shadow-md">
                                        <button id="decrement"
                                            class="w-10 h-10 text-xl font-bold bg-red-500 text-white rounded-full hover:bg-red-600">
                                            −
                                        </button>

                                        <input id="counterInput" type="number" value="0" readonly
                                            class="w-16 text-center text-lg border border-gray-300 rounded-md px-2 py-1" />

                                        <button id="increment"
                                            class="w-10 h-10 text-xl font-bold bg-green-500 text-white rounded-full hover:bg-green-600">
                                            +
                                        </button>
                                    </div> --}}
                                </div>



                                {{-- //////////////////// --}}


=======
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>


>>>>>>> 5a265721a20daab403fd0abfebf8148c031925db
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>

    </div>
<<<<<<< HEAD
    {{-- <script>
        const input = document.getElementById('counterInput');
        const incrementBtn = document.getElementById('increment');
        const decrementBtn = document.getElementById('decrement');

        let count = 0;

        incrementBtn.addEventListener('click', () => {
            count++;
            input.value = count;
        });

        decrementBtn.addEventListener('click', () => {
            if (count > 0) {
                count--;
                input.value = count;
            }
        });
    </script> --}}
=======
>>>>>>> 5a265721a20daab403fd0abfebf8148c031925db
@endsection
