{{-- <div x-data="{ show: false, message: '', type: 'success' }" x-init="
    window.addEventListener('mostrar-mensaje', event => {
        console.log('⚡ Evento recibido:', event.detail); // DEBUG
        message = event.detail.message;
        type = event.detail.type;
        show = true;
        setTimeout(() => show = false, 4000);
    });
" x-show="show" x-transition
    class="px-4 py-2 mb-4 rounded shadow fixed top-4 right-4 z-50"
    :class="{
        'bg-green-100 text-green-800': type === 'success',
        'bg-red-100 text-red-800': type === 'error',
        'bg-yellow-100 text-yellow-800': type === 'warning',
        'bg-blue-100 text-blue-800': type === 'info'
    }">
    <span x-text="message"></span>
</div> --}}
<div x-data="{ show: false, mensaje: '' }" x-init="$wire.on('mensaje', texto => {
    mensaje = texto;
    show = true;
    setTimeout(() => show = false, 3000);
});" x-show="show" x-transition
    class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative mb-4">
    <span x-text="mensaje"></span>
</div>
