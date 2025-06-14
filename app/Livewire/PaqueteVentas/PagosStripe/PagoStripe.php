<?php

namespace App\Livewire\PaqueteVentas\PagosStripe;

use Livewire\Component;
use Stripe\Stripe;
use Stripe\Charge;


class PagoStripe extends Component
{
    public $monto = 1000; // En centavos, 1000 = Bs 10

    public function procesarPago($token)
    {
        // dd($token);
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            Charge::create([
                'amount' => $this->monto,
                'currency' => 'usd', // Stripe no acepta BOB, pero puedes convertir
                'description' => 'Pago desde Bolivia ultimo pago',
                'source' => $token,
            ]);

            session()->flash('success', '✅ Pago exitoso');
        } catch (\Exception $e) {
            session()->flash('error', '❌ Error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.paquete-ventas.PagoStripe.pago-stripe');
    }
}
