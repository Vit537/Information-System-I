<div class="p-4" x-data>
  <h2 class="text-xl font-bold mb-4">Pagar con tarjeta</h2>

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
        @endif
</div>
{{--
    <a href="https://buy.stripe.com/test_7sY4gzaZM5YmcVNfB90co00" class="rounded-md px-3 py-5 bg-slate-700 text-slate-100"> pagar</a> --}}






 {{-- <div class="p-4" >

    <!-- En tu Blade -->
    <div class="mb-4">
        <label class="block font-semibold mb-1">Número de tarjeta</label>
        <div id="card-number" class="border px-3 py-2 rounded bg-white"></div>
    </div>

    <div class="mb-4 flex gap-4">
        <div class="w-1/2">
            <label class="block font-semibold mb-1">Expiración</label>
            <div id="card-expiry" class="border px-3 py-2 rounded bg-white"></div>
        </div>
        <div class="w-1/2">
            <label class="block font-semibold mb-1">CVC</label>
            <div id="card-cvc" class="border px-3 py-2 rounded bg-white"></div>
        </div>



    </div>



    <button id="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Pagar</button>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stripe = Stripe("{{ env('STRIPE_KEY') }}");

            const elements = stripe.elements();

            const style = {
                base: {
                    fontSize: '16px',
                    color: '#1F2937',
                    '::placeholder': {
                        color: '#9CA3AF'
                    }
                },
                invalid: {
                    color: '#DC2626',
                }
            };

            const cardNumber = elements.create('cardNumber', {
                style
            });
            // const cardExpiry = elements.create('cardExpiry', {
            //     style
            // });
            // const cardCvc = elements.create('cardCvc', {
            //     style
            // });

            cardNumber.mount('#card-number');
            // cardExpiry.mount('#card-expiry');
            // cardCvc.mount('#card-cvc');

            document.getElementById('submit').addEventListener('click', async function() {
                const country = document.getElementById('country').value;
                const {
                    token,
                    error
                } = await stripe.createToken(cardNumber);
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
    @endif
</div> --}}



 {{-- <div x-data="{ open: false, selected: '', countries: ['Bolivia', 'Chile', 'Argentina', 'Estados Unidos'] }" class="mb-4">
        <label class="block font-semibold mb-1">País</label>

        <!-- Custom Select Trigger -->
        <div @click.away="open = false" class="relative">
            <button @click="open = !open"
                class="border px-3 py-2 w-full rounded bg-white text-left flex justify-between items-center ">
                <span x-text="selected || 'Selecciona un país'"></span>
                <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <!-- Opciones personalizadas -->
            <div x-show="open" x-transition
                class="absolute z-10 mt-1 w-full bg-white border rounded shadow-lg max-h-60 overflow-auto">
                <template x-for="country in countries" :key="country">
                    <div @click="selected = country; open = false" class="px-3 py-2 cursor-pointer hover:bg-gray-100"
                        x-text="country"></div>
                </template>
            </div>
        </div>
    </div>--}}


{{-- <script>
        document.addEventListener('DOMContentLoaded', async () => {
            // Load the publishable key from the server. The publishable key
            // is set in your .env file.
            const {
                publishableKey
            } = await fetch('/config').then((r) => r.json());
            if (!publishableKey) {
                addMessage(
                    'No publishable key returned from the server. Please check `.env` and try again'
                );
                alert('Please set your Stripe publishable API key in the .env file');
            }

            const stripe = Stripe(publishableKey, {
                apiVersion: '2020-08-27',
            });

            // On page load, we create a PaymentIntent on the server so that we have its clientSecret to
            // initialize the instance of Elements below. The PaymentIntent settings configure which payment
            // method types to display in the PaymentElement.
            const {
                error: backendError,
                clientSecret
            } = await fetch('/create-payment-intent').then(r => r.json());
            if (backendError) {
                addMessage(backendError.message);
            }
            addMessage(`Client secret returned.`);

            // Initialize Stripe Elements with the PaymentIntent's clientSecret,
            // then mount the payment element.
            const loader = 'auto'
            const elements = stripe.elements({
                clientSecret,
                loader
            });
            const paymentElement = elements.create('payment');
            paymentElement.mount('#payment-element');
            // Create and mount the linkAuthentication Element to enable autofilling customer payment details
            const linkAuthenticationElement = elements.create("linkAuthentication");
            linkAuthenticationElement.mount("#link-authentication-element");
            // If the customer's email is known when the page is loaded, you can
            // pass the email to the linkAuthenticationElement on mount:
            //
            //   linkAuthenticationElement.mount("#link-authentication-element",  {
            //     defaultValues: {
            //       email: 'jenny.rosen@example.com',
            //     }
            //   })
            // If you need access to the email address entered:
            //
            //  linkAuthenticationElement.on('change', (event) => {
            //    const email = event.value.email;
            //    console.log({ email });
            //  })

            // When the form is submitted...
            const form = document.getElementById('payment-form');
            let submitted = false;
            form.addEventListener('submit', async (e) => {
                e.preventDefault();

                // Disable double submission of the form
                if (submitted) {
                    return;
                }
                submitted = true;
                form.querySelector('button').disabled = true;

                const nameInput = document.querySelector('#name');

                // Confirm the payment given the clientSecret
                // from the payment intent that was just created on
                // the server.
                const {
                    error: stripeError
                } = await stripe.confirmPayment({
                    elements,
                    confirmParams: {
                        return_url: `${window.location.origin}/return.html`,
                    }
                });

                if (stripeError) {
                    addMessage(stripeError.message);

                    // reenable the form.
                    submitted = false;
                    form.querySelector('button').disabled = false;
                    return;
                }
            });
        });
    </script> --}}
