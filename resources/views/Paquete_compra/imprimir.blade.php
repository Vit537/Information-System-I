{{-- @extends('layouts.factura')

@section('print') --}}
{{-- <livewire:PaqueteCompras.NotaCompra > --}}
{{-- <livewire:PaqueteCompras.ImprimirFactura :compra_id="$compra_id"/> --}}
{{-- </livewire:PaqueteCompras.NotaCompra> --}}
{{-- mostrar la tabla --}}


{{-- <div class="p-10 flex justify-center items-center  ">
        <a href="#" target="_blank"
        {{-- <a href="{{ route('orden.pdf', ['id' => 5]) }}" target="_blank
            class="btn btn-primary bg-green-500  rounded-md px-3 py-4 hover:bg-green-300">
            <strong>Descargar PDF</strong>
        </a>
    </div>
    <section class="flex justify-center items-center">
        <div class="w-full  md:w-4/5">




            <div x-data="{ open: false }" class="">
                <button @click="open = !open"
                    class="w-full flex items-center justify-between py-2 px-3 rounded hover:bg-blue-300 border border-b-4  focus:outline-none">
                    <strong>Ver factura</strong>
                    <svg :class="{ 'rotate-90': open }" class="w-4 h-4 transform transition-transform" fill="none"
                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <div x-show="open" x-collapse class="ml-4 mt-1 space-y-1">


                </div>
            </div>
        </div>
    </section> --}}
{{-- @endsection --}}
{{-- @extends('layouts.dashboard') --}}


@extends('layouts.dashboard')

@section('print')
     <div class="p-10 flex justify-center items-center  ">
        <a href="{{route('pdf.compras',$compra_id)}}" target="_blank" {{-- <a href="{{ route('orden.pdf', ['id' => 5]) }}" target="_blank--}}
            class="btn btn-primary bg-blue-400  rounded-md px-3 py-4 hover:bg-blue-300">
            <strong>Descargar PDF</strong>
        </a>
    </div>
     {{-- <div class="p-10 flex justify-center items-center  ">
        <a href="{{route('pdf.compras',$compra_id)}}" target="_blank" {{-- <a href="{{ route('orden.pdf', ['id' => 5]) }}" target="_blank
            class="btn btn-primary bg-blue-400  rounded-md px-3 py-4 hover:bg-blue-300">
            <strong>Descargar PDF</strong>
        </a>
    </div> --}}
    {{-- <button wire:click="imprimirFactura" class="bg-blue-600 text-white px-4 py-2 rounded">
    Imprimir Factura
</button> --}}

    <section class="flex justify-center items-center">
        <div class="w-full  md:w-4/5">
            <div x-data="{ open: false }" class="">
                <button @click="open = !open"
                    class="w-full flex items-center justify-between py-2 px-3 rounded bg-blue-100 hover:bg-blue-300 border border-b-4  focus:outline-none">
                    <strong>Ver factura</strong>
                    <svg :class="{ 'rotate-90': open }" class="w-4 h-4 transform transition-transform" fill="none"
                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <div x-show="open" x-collapse class="ml-4 mt-1 space-y-1">

                    <div id="viewer-container"
                        class="w-full h-[90vh] bg-gray-100 overflow-hidden relative border border-gray-400 rounded">
                        <div id="document" class="origin-top-left absolute left-1/2 top-1/2"
                            style="transform: translate(-50%, -50%) scale(1);">
                            {{-- @include('partials.factura') --}}
                            {{-- <div class="max-w-5xl mx-auto border border-gray-300 p-6 rounded bg-white">
                <livewire:PaqueteCompras.ImprimirFactura :compra_id="$compra_id" />
            </div> --}}
                            <div class="max-w-[816px] mx-auto bg-white shadow-lg p-8 border border-gray-300"
                                style="width: 816px; height: 1056px;">
                                {{-- Este tamaño es aproximadamente carta: 8.5x11 pulgadas en px a 96dpi --}}

                                <div class="max-w-5xl mx-auto border border-gray-300 p-6 rounded bg-white">
                                    <livewire:PaqueteCompras.ImprimirFactura :compra_id="$compra_id" />
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--  --}}
    {{-- <div class="bg-white p-10 text-sm text-gray-900"> --}}



{{-- <script>
    window.addEventListener('imprimir', () => {
        window.print();
    });
</script> --}}


    <script>
        const container = document.getElementById('viewer-container');
        const doc = document.getElementById('document');


        let scale = 1;
        let pos = {
            x: 0,
            y: 0
        };
        let isDragging = false;
        let start = {
            x: 0,
            y: 0
        };



        // Zoom con scroll
        container.addEventListener('wheel', (e) => {
            e.preventDefault();
            const delta = e.deltaY > 0 ? -0.1 : 0.1;
            scale = Math.min(Math.max(0.5, scale + delta), 3); // Límite de zoom
            updateTransform();
        });

        // Pan con mouse
        container.addEventListener('mousedown', (e) => {
            isDragging = true;
            start.x = e.clientX - pos.x;
            start.y = e.clientY - pos.y;
        });

        window.addEventListener('mouseup', () => isDragging = false);

        window.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            pos.x = e.clientX - start.x;
            pos.y = e.clientY - start.y;
            updateTransform();
        });

    //    function updateTransform() {
  //          doc.style.transform = `translate(calc(-50% + ${pos.x}px), calc(-50% + ${pos.y}px)) scale(${scale})`;
//        }

        // --- TOUCH (móvil)
        container.addEventListener('touchstart', (e) => {
            if (e.touches.length === 1) {
                isDragging = true;
                const touch = e.touches[0];
                start.x = touch.clientX - pos.x;
                start.y = touch.clientY - pos.y;
            }
        });

        container.addEventListener('touchmove', (e) => {
            if (!isDragging || e.touches.length !== 1) return;
            const touch = e.touches[0];
            pos.x = touch.clientX - start.x;
            pos.y = touch.clientY - start.y;
            updateTransform();
        });

        window.addEventListener('touchend', () => {
            isDragging = false;
        });

        // --- Actualizar posición y escala
        function updateTransform() {
            doc.style.transform = `translate(calc(-50% + ${pos.x}px), calc(-50% + ${pos.y}px)) scale(${scale})`;
        }
    </script>

    {{-- </div> --}}
@endsection
