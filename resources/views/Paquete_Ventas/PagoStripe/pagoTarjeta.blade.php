 @extends('layouts.dashboard')

 @section('content')
 {{-- <h1>aqui es el metodo de pago</h1> --}}

 {{-- <livewire:PaqueteVentas.PagosStripe.PagoStripe/> --}}

 {{--  --}}

 <h1 class="flex text-2xl justify-center font-bold mb-4 text-slate-50 dark:text-slate-900">Metodo de pago</h1>

 <div class="flex justify-center items-center">
     <div class="w-full md:w-1/2  ">
         <section class="border rounded-md shadow-md p-4 bg-white">
             <div class="w-full flex justify-center items-center py-2 border-b-4 border-slate-400">
                 {{-- <span class="font-semibold text-lg text-gray-800 ">Seleccionar metodo de pago</span> --}}
                 <h2 class="text-xl font-bold mb-4">Pagar con tarjeta</h2>

             </div>


             {{-- <div
                 class="w-full flex justify-between items-center py-2 border-b-4 border-red-600">
                 <span class="font-semibold text-lg text-gray-800">Especificaciones</span>
                 <svg class="w-5 h-5 transform transition-transform duration-300" :class="{ 'rotate-180': open }">
                     <use xlink:href="#icon_sprite_icon-chevron_down"></use>
                 </svg>
             </div> --}}




             <livewire:PaqueteVentas.PagosStripe.PagoStripe/>




         </section>
     </div>
 </div>
 @endsection
