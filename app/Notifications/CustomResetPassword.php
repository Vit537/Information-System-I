<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomResetPassword extends Notification
{
    use Queueable;
    public $token;

    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    // public function via(object $notifiable): array
    // {
    //     return ['mail'];
    // }

    public function via($notifiable): array
     {
         return ['mail'];
     }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }




    public function toMail($notifiable)
    {


        // dd($notifiable->correo);
        $url = url(route('password.reset', [
            'token' => $this->token,
            'correo' => $notifiable->correo, // aquí incluyes el correo en el link
            // 'correo' => $notifiable->email, // aquí incluyes el correo en el link
        ], false));

        //   dd($url);


        return (new MailMessage)
            ->subject('Restablecer contraseña')
            ->line('Has solicitado restablecer tu contraseña.')
            ->action('Restablecer contraseña', $url)
            ->line('Si no realizaste esta solicitud, ignora este mensaje.');
    }



    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray( $notifiable): array
    {
        return [
            //
        ];
    }
    // public function toArray(object $notifiable): array
    // {
    //     return [
    //         //
    //     ];
    // }
}
