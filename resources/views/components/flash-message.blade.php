@props([
    'message' => '',
    'type' => 'success', // puede ser success, error, warning, etc.
    'timeout' => 4000 // milisegundos
])

<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, {{ $timeout }})"
    x-show="show"
    x-transition
    class="px-4 py-2 mb-4 rounded shadow
        @if($type === 'success') bg-green-100 text-green-800
        @elseif($type === 'error') bg-red-100 text-red-800
        @elseif($type === 'warning') bg-yellow-100 text-yellow-800
        @elseif($type === 'status') bg-green-100 text-green-800
        @endif
    "
>
    {{ $message }}
</div>
