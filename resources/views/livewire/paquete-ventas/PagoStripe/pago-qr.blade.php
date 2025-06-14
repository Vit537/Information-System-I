{{-- <div class="p-4" x-data> --}}
{{-- <h2 class="text-xl font-bold mb-4">Pagar con tarjeta</h2>

    <div id="card-element" class="border p-2 rounded mb-4"></div>
    <button id="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Pagar</button>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stripe = Stripe("{{ env('STRIPE_KEY') }}");

            const elements = stripe.elements();
            const card = elements.create('card');
             card.mount('#card-element');

            document.getElementById('submit').addEventListener('click', async function() {
                const {
                    token,
                    error
                } = await stripe.createToken(card);
                if (error) {
                    alert(error.message);
                } else {
                    @this.call('procesarPago', token.id);
                }
            });
        });
    </script>

    @if (session('success'))
        <div class="mt-4 text-green-600">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="mt-4 text-red-600">{{ session('error') }}</div>
    @endif --}}
{{--
    <a href="https://buy.stripe.com/test_7sY4gzaZM5YmcVNfB90co00" class="rounded-md px-3 py-5 bg-slate-700 text-slate-100"> pagar</a>
</div> --}}



    {{-- <!-- QR
                     <div class="relative group">
                         <a href="https://wa.me/71607173?text=Hola%20te%20saludo%20desde%20mi%20web">
                             <div
                                 class="overflow-hidden rounded-lg shadow-lg border border-gray-200 group-hover:border-green-500 transition-colors duration-300">
                                 <img src="assets/QR.jpg" alt="Pago con QR"
                                     class="w-60 h-72 object-contain transition-transform duration-500 group-hover:scale-110">
                             </div>
                             {{-- object-cover
                             <p
                                 class="mt-4 text-center text-gray-700 font-medium group-hover:text-green-600 transition-colors">
                                 Enviar</p>
                         </a>
                     </div> --}}

    {{-- <a href="https://web.whatsapp.com/send?text=Te%20comparto%20esta%20imagen%20https://tudominio.com/assets/imagen.jpg" target="_blank">
  <img src="assets/imagen.jpg" alt="Compartir en WhatsApp" width="100">
</a> --}}
<div class="p-4  " x-data>
    <div class=" flex justify-center items-center ">

        <img id="mi-imagen" src="assets/QR.jpg" alt="Imagen compartible"
            class="w-full/2 md:w-96 h-auto rounded shadow-md">
            {{-- class="mx-auto max-w-full h-auto rounded shadow-md"> --}}






    </div>
    <div class="mt-4 flex justify-center gap-4">
            <!-- Botón para guardar -->
            <button onclick="descargarImagen()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Guardar Imagen
            </button>

            <!-- Botón para compartir en WhatsApp -->

            <a href="https://api.whatsapp.com/send?text=¡Mira%20esta%20imagen!%20https://tudominio.com/assets/imagen.jpg"
                target="_blank" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Compartir en WhatsApp
            </a>
        </div>

    <script>
        function descargarImagen() {
            const url = document.getElementById('mi-imagen').src;
            const nombreArchivo = url.substring(url.lastIndexOf('/') + 1);

            const enlace = document.createElement('a');
            enlace.href = url;
            enlace.download = nombreArchivo;
            document.body.appendChild(enlace);
            enlace.click();
            document.body.removeChild(enlace);
        }
    </script>


    @if (session('success'))
        <div class="mt-4 text-green-600">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="mt-4 text-red-600">{{ session('error') }}</div>
    @endif
</div>

