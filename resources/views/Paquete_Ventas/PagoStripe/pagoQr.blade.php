 @extends('layouts.dashboard')

 @section('content')
     {{-- <h1>aqui es el metodo de pago</h1> --}}

     {{-- <livewire:PaqueteVentas.PagosStripe.PagoStripe/> --}}

     {{--  --}}

     <h1 class="flex text-2xl justify-center font-bold mb-4 text-slate-50 dark:text-slate-900">Metodo de pago</h1>

     {{-- <div class="grid grid-cols-1 md:grid-cols-2  ">
         <div class="bg-white">
             <div class="  ">
                 <section class="  p-4 bg-white">
                     <div class="w-full flex justify-center items-center py-2 border-b-4 border-slate-400">
                         {{-- <span class="font-semibold text-lg text-gray-800 ">Seleccionar metodo de pago</span>
                         <h2 class="text-xl font-bold mb-4">Productos</h2>

                     </div>


                     {{-- <livewire:PaqueteVentas.PagosStripe.pagoQr />
                     <livewire:PaqueteVentas.PagosStripe.MostrarProductos  />

                 </section>
             </div>
         </div> --}}
     <div class="flex justify-center items-center">
         <div class="w-full md:w-1/2">
             <section class="border rounded-md  shadow-md p-4 bg-white">
                 <div class="w-full flex justify-center items-center py-2 border-b-4 border-slate-400">
                     {{-- <span class="font-semibold text-lg text-gray-800 ">Seleccionar metodo de pago</span> --}}
                     <h2 class="text-xl font-bold mb-4">Pago con QR</h2>

                 </div>


                 <livewire:PaqueteVentas.PagosStripe.PagoQr />


             </section>
         </div>
     </div>
     </div>
 @endsection
