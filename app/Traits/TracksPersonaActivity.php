<?php

namespace App\Traits;
use App\Models\AuditLog\personaActi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

trait TracksPersonaActivity
{
   protected function trackActivity(string $eventType, string $eventName, array $metadata = [])
    {
        // Para Jetstream, el usuario puede estar en $metadata['user_id']
        $userId = auth()->id() ?? $metadata['persona_id'] ?? null;

          //try {


             personaActi::create([
                 'persona_id' => $userId,
                 'event_type' => $eventType,
                 'event_name' => $eventName,
                 'metadata' => array_merge($metadata, [
                     'via_jetstream' => true,
                     'team_id' => optional(auth()->user())->currentTeam->id ?? null
                 ]),
                 'ip_address' => $metadata['ip'] ?? request()->ip(),
                 'user_agent' => request()->userAgent()
            ]);
        //   } catch (\Exception $e) {
        //      // Puedes loggear el error si quieres
        //      dd('paso uun error');
        //       Log::error('Error al registrar actividad', [
        //           'error' => $e->getMessage(),
        //           'event_type' => $eventType,
        //           'event_name' => $eventName,
        //           'user_id' => Auth::id(),
        //           'trace' => $e->getTraceAsString()
        //       ]);
        //   }
    }
}
