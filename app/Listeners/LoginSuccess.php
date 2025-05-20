<?php

namespace App\Listeners;

//use App\TracksPersonaActivity as AppTracksPersonaActivity;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Traits\TracksPersonaActivity;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;
// use Laravel\Jetstream\Agent;

use Jenssegers\Agent\Agent;


use Illuminate\Http\Request;

class LoginSuccess
{
     use TracksPersonaActivity;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
           $agent = new Agent();

       // dd('herny inicio sesion');
         $this->trackActivity('auth', 'login', [
             'ip' => request()->ip(),
             'device' => $agent->isDesktop() ? 'Desktop' : ($agent->isMobile() ? 'Mobile' : ($agent->isTablet() ? 'Tablet' : 'Unknown')),
              'platform' => $agent->platform(),
              'browser' => $agent->browser(),
              'jetstream' => true,  // Identificador para acciones de Jetstream
            //  'henry ' => 'herny'
         ]);

    }
}
