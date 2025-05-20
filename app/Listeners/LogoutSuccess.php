<?php

namespace App\Listeners;

//use App\TracksPersonaActivity as AppTracksPersonaActivity;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Traits\TracksPersonaActivity;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Log;
// use Laravel\Jetstream\Agent;

use Jenssegers\Agent\Agent;


use Illuminate\Http\Request;

class LogoutSuccess
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
    public function handle(Logout $event): void
    {
           $userId = $event->user->id ?? null;

       // dd('herny inicio sesion');
         $this->trackActivity('auth', 'logout', [
              'ip' => request()->ip(),
             'user_id' => $userId,
             'jetstream' => true,
         ]);

    }
}
