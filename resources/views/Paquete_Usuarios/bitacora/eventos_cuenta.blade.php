@extends('layouts.dashboard')


@section('content')
    <div class="px-10">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
            <table
                class="w-full text-sm text-left text-gray-800 dark:text-gray-300 border-collapse bg-white dark:bg-gray-800">
                <thead class="text-xs text-black uppercase bg-slate-400 dark:bg-slate-600">
                    <tr>

                        <th scope="col" class="px-6 py-3">
                            persona_id
                        </th>

                        <th scope="col" class="px-6 py-3">
                            tipo evento
                        </th>
                        <th scope="col" class="px-6 py-3">
                            nombre evento
                        </th>
                        <th scope="col" class="px-6 py-3">
                            datos
                        </th>
                        <th scope="col" class="px-6 py-3">
                            navegador/SOperativo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            fecha/hora
                        </th>

                    </tr>
                </thead>
                <tbody>
                    {{-- contenido --}}
                    @foreach ($actividades as $actividad)
                        <tr>

                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">
                                {{ $actividad->persona_id }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">
                                {{ $actividad->event_type }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">
                                {{ $actividad->event_name }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">
                                <ul>
                                    @foreach ($actividad->metadata as $clave => $valor)
                                        <li><strong>{{ $clave }}:</strong> {{ $valor }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            {{-- <td class="border border-gray-300 dark:border-gray-600 text-gray-800">{{ $actividad->metadata }}</td> --}}
                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">
                                {{ $actividad->user_agent }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">
                                {{ $actividad->created_at }}</td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection
