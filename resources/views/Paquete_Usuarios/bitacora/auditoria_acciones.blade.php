@extends('layouts.dashboard')

@section('content')
    <div class="px-10 py-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-700 dark:text-white">Login Events</h2>

        <div class="relative overflow-x-auto shadow-lg sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-900">
                <thead class="text-xs uppercase bg-gradient-to-r from-slate-500 to-slate-700 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-4">IP Address</th>
                        <th scope="col" class="px-6 py-4">Persona ID</th>
                        <th scope="col" class="px-6 py-4">Browser</th>
                        <th scope="col" class="px-6 py-4">Event Time</th>
                        <th scope="col" class="px-6 py-4">Event</th>
                        <th scope="col" class="px-6 py-4">Description</th>
                        <th scope="col" class="px-6 py-4">Loggable ID</th>
                        <th scope="col" class="px-6 py-4">Type</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($actions as $action)
                        <tr class="hover:bg-slate-100 dark:hover:bg-gray-700 transition-colors">
                            <td class="px-6 py-4">{{ $action->ip_address }}</td>
                            <td class="px-6 py-4">{{ $action->persona_id }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-2 py-1 rounded bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                    {{ $action->browser }}
                                </span>
                            </td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($action->event_time)->format('Y-m-d H:i') }}</td>
                            <td class="px-6 py-4">
                                <span class="font-semibold text-green-600 dark:text-green-400">{{ ucfirst($action->event) }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                                @php
                                    $isLong = strlen($action->description) > 40;
                                @endphp
                                @if ($isLong)
                                    <div x-data="{ expanded: false }">
                                        <div class="bg-gray-100 dark:bg-gray-700 p-3 rounded shadow-sm">
                                            <template x-if="!expanded">
                                                <span>
                                                    {{ Str::limit($action->description, 40) }}
                                                    <button @click="expanded = true" class="text-blue-600 hover:underline ml-2">Read more</button>
                                                </span>
                                            </template>

                                            <template x-if="expanded">
                                                <div>
                                                    <p>{{ $action->description }}</p>
                                                    <button @click="expanded = false" class="text-red-500 hover:underline mt-2 inline-block">Show less</button>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                @else
                                    <div class="bg-gray-100 dark:bg-gray-700 p-3 rounded shadow-sm">
                                        {{ $action->description }}
                                    </div>
                                @endif
                            </td>

                            <td class="px-6 py-4">{{ $action->loggable_id }}</td>
                            <td class="px-6 py-4">
                                <span class="text-indigo-500 dark:text-indigo-300">{{ class_basename($action->loggable_type) }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
