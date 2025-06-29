{{-- <div>
    {{-- In work, do what you enjoy.
</div> --}}




<div class="px-10">

    @if (session()->has('mensaje'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative mb-4">
            {{ session('mensaje') }}
        </div>
    @endif


    <x-show-message />

    <div class="flex justify-between py-2">


        <div class="gap-4 flex w-full flex-col md:flex-row  justify-center items-center py-2">
            <a href="{{ route('add.compra') }}"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Crear orden compra
            </a>

            {{-- <a href="#"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                lista producto
            </a> --}}

        </div>

    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
        <table
            class="w-full text-sm text-left text-gray-800 dark:text-black border-collapse bg-zinc-100 dark:bg-zinc-300 dark:border-s-gray-400">
            <thead
                class="text-xs text-black dark:text-gray-800 uppercase bg-gray-200 dark:bg-slate-400 border-b-4 border-gray-400 dark:border-gray-500">
                {{-- dark:bg-slate-400 --}}
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <h4>Nombre</h4>
                        <h5>Proveedor/Empresa</h5>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <h4>Fecha</h4>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <h4>Ver detalle/factura</h4>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <h4>Acciones</h4>
                    </th>

                </tr>
            </thead>
            <tbody>
                {{-- contenido --}}
                @foreach ($proveedores as $proveedor)
                    <tr>

                        <td class="border-b-2 border-gray-300 dark:border-gray-400">
                            <div class="font-semibold text-base text-gray-800 dark:text-gray-800">
                                {{ $proveedor->proveedor->persona->nombre }}</div>
                            <div class="text-sm text-gray-600 dark:text-gray-600">
                                {{ $proveedor->proveedor->persona->correo }}</div>
                        </td>
                        {{-- <td class="border border-gray-300 dark:border-gray-600">{{ $proveedor->persona->nombre }}</td> --}}

                        <td class="border-b-2 border-gray-300 dark:border-gray-400">{{ $proveedor->created_at }}</td>
                        <td class="border-b-2 border-gray-300 dark:border-gray-400">

                            <a href="{{ route('print.compras', $proveedor->id) }}"> <img
                                    src="https://images.emojiterra.com/google/android-10/512px/1f9fe.png" alt="Imagen"
                                    width="40"></a>

                        </td>



                        <td class="border-b-2 border-gray-300 dark:border-gray-400">
                            <div class="flex space-x-2">
                                {{-- <a href="{{ route('articles.edit', [$article->id]) }}" --}}
                                {{-- <a href="#"
                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    {{-- <i class="fa fa-edit"></i>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>

                                </a> --}}
                                {{-- editar --}}

                                <a href="{{ route('edit.compra', $proveedor->id) }}"
                                    class="focus:outline-none text-white bg-slate-500 hover:bg-slate-400 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-slate-500 dark:hover:bg-slate-400 dark:focus:ring-green-800">
                                    {{-- <i class="fa fa-edit"></i> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>

                                </a>

                                {{-- @if (auth()->user()->tipo === 'proveedor')

                                        {{-- <a href="{{ route('articles.audit', $article)}}" title="ver auditoria"
                                        <a href="#" title="ver auditoria"
                                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endif --}}
                                {{-- <form action="{{route('articles.destroy', $article)}}" method="POST">  --}}
                                {{-- <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE') --}}
                                {{-- eliminar --}}
                                <button wire:click="deleteCompra({{ $proveedor->id }})"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta compra?');"
                                    class="focus:outline-none text-white bg-slate-500 hover:bg-slate-400 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-slate-500 dark:hover:bg-slate-400 dark:focus:ring-green-800">
                                    {{-- <i class="fa fa-trash"></i> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>

                                </button>
                                {{-- </form> --}}

                            </div>





                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>

</div>
