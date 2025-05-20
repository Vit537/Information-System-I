{{-- articles/index.blade.php --}}

@extends('layouts.dashboard')


@section('content')
    <div class="px-10">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
            <table class="w-full text-sm text-left text-gray-800 dark:text-gray-300 border-collapse bg-white dark:bg-gray-800">
                <thead class="text-xs text-black uppercase bg-slate-400 dark:bg-slate-600">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ip_address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            persona_id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            browser
                        </th>
                        <th scope="col" class="px-6 py-3">
                            event_time
                        </th>
                        <th scope="col" class="px-6 py-3">
                            event
                        </th>
                        <th scope="col" class="px-6 py-3">
                            description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            loggable_id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            loggable_type
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- contenido --}}
                    @foreach ($logins as $login)
                        <tr>

                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">{{ $login->ip_address }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">{{ $login->persona_id }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">{{ $login->browser }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">{{ $login->event_time }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">{{ $login->event }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">{{ $login->description }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">{{ $login->loggable_id }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 text-gray-800">{{ $login->loggable_type }}</td>
                            
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection
