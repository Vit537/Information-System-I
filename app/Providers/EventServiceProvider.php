<?php

namespace App\Providers;


use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

use App\Listeners\LoginSuccess;
use App\Listeners\LogoutSuccess;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{
    /**
     * Los eventos que tu aplicación debería escuchar.
     *
     * @var array
     */
    //  protected $listen = [
    //      Login::class => [
    //          LogUserLogin::class,
    //      ],
    //      Logout::class => [
    //          LogUserLogout::class,
    //      ],
    //  ];
    protected $listen = [
        Login::class => [
            LoginSuccess::class, // Asegúrate que esté así
        ],
        Logout::class => [
           LogoutSuccess::class,
        ],
    ];

    // protected $listen = [
    //     \Illuminate\Auth\Events\Login::class => [
    //         \App\Listeners\LogUserLogin::class,
    //     ],
    //     \Illuminate\Auth\Events\Logout::class => [
    //         \App\Listeners\LogUserLogout::class,
    //     ],
    // ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }
}
