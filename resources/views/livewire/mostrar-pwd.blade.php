{{-- Do your work, then step back. --}}


<div class="flex items-center space-x-2">




    <button wire:click.prevent="toggleContrasena" type="button" class="text-gray-600 hover:text-gray-900">
        @if ($mostrarContrasena)
            <!-- Ojo abierto (mostrando) -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.522 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7s-8.268-2.943-9.542-7z" />
            </svg>
        @else
            <!-- Ojo tachado (oculto) -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.403-3.568M6.22 6.22a9.953 9.953 0 014.49-1.22c4.478 0 8.268 2.943 9.542 7a9.953 9.953 0 01-4.124 5.296M6.22 6.22L3 3m0 0l18 18" />
            </svg>
            <div class="bg-red-600"></div>
        @endif
    </button>
    <span class="font-mono break-all max-w-xs">
        {{ $mostrarContrasena ? $usuario->contrasena : '********' }}
    </span>


</div>




{{-- <x-product-detail label="Contraseña">

</x-product-detail> --}}
