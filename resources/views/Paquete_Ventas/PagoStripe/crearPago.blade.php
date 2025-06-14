 @extends('layouts.dashboard')

 @section('content')
     {{-- <h1>aqui es el metodo de pago</h1> --}}

     {{-- <livewire:PaqueteVentas.PagosStripe.PagoStripe/> --}}

     <h1 class="flex text-2xl justify-center font-bold mb-4 text-slate-50 dark:text-slate-900">Metodo de pago</h1>

     <div class="flex justify-center items-center">
         <div class="w-full md:w-1/2  ">
             <section class="border rounded-md shadow-md p-4 bg-white">
                 <div class="w-full flex justify-center items-center py-2 border-b-4 border-slate-400">
                     <span class="font-semibold text-lg text-gray-800 ">Seleccionar metodo de pago</span>

                 </div>


                 {{-- <div
                    class="w-full flex justify-between items-center py-2 border-b-4 border-red-600">
                    <span class="font-semibold text-lg text-gray-800">Especificaciones</span>
                    <svg class="w-5 h-5 transform transition-transform duration-300" :class="{ 'rotate-180': open }">
                        <use xlink:href="#icon_sprite_icon-chevron_down"></use>
                    </svg>
                </div>

                <div class="mt-4 space-y-2">
                    {{-- <x-product-detail label="Nombre" :value="1234" />
                    <x-product-detail label="Correo" :value="1234" />
                    {{-- <div class="flex border-b py-1">
                        <p class="w-52 font-medium text-gray-600">Contrasena</p>
                        <p class="text-gray-800 ">
                            <livewire:mostrar-pwd :usuario="$usuario" />
                        </p>
                    </div>
                    <x-product-detail label="Direccion" :value="1234" />
                    <x-product-detail label="Telefono" :value="1234" />
                    <x-product-detail label="Tipo" :value="1234" /> --}}

                 {{-- <div class="flex items-center justify-center gap-16">
                     <div class="w-24 h-24 py-14 hover:w-28 ">
                         <a href="#"><img src="assets/imgTarjeta.jpg" alt=""></a>
                         {{-- <a href="{{route('pago.qr')}}"><img src="" alt=""></a>

                     </div>
                     <div class="w-24 h-24 py-14 hover:w-28">
                         <a href="#"><img src="assets/imgQR.avif" alt="tarjeta"></a>
                         {{-- <a href="{{route('pago.tarjeta')}}"><img src="" alt=""></a>

                     </div>
                 </div> --}}
                 <div class="flex flex-col md:flex-row items-center justify-center gap-12 p-6">
                     <!-- Tarjeta -->
                     <div class="relative group">
                         <a href="{{route('pago.tarjeta')}}" class="block transition-transform duration-300 transform hover:scale-105">
                             <div
                                 class="overflow-hidden rounded-lg shadow-lg border border-gray-200 group-hover:border-indigo-500 transition-colors duration-300">
                                 <img src="assets/imgTarjeta.jpg" alt="Pago con tarjeta"
                                     class="w-28 h-28 object-contain transition-transform duration-500 group-hover:scale-110">
                             </div>
                             <p
                                 class="mt-4 text-center text-gray-700 font-medium group-hover:text-indigo-600 transition-colors">
                                 Tarjeta</p>
                         </a>
                     </div>

                     <!-- QR -->
                     <div class="relative group">
                         <a href="{{route('pago.qr')}}" class="block transition-transform duration-300 transform hover:scale-105">
                             <div
                                 class="overflow-hidden rounded-lg shadow-lg border border-gray-200 group-hover:border-green-500 transition-colors duration-300">
                                 <img src="assets/imgQR.avif" alt="Pago con QR"
                                     class="w-28 h-28 object-contain transition-transform duration-500 group-hover:scale-110">
                             </div>
                             {{-- object-cover --}}
                             <p
                                 class="mt-4 text-center text-gray-700 font-medium group-hover:text-green-600 transition-colors">
                                 Código QR</p>
                         </a>
                     </div>
                 </div>

                 {{-- <livewire:PaqueteVentas.PagosStripe.PagoStripe/> --}}

         </div>
         </section>
     </div>
     </div>
 @endsection
