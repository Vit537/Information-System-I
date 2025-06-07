<?php

namespace App\Models\Paquete_Usuarios\Auth;


use App\Models\AuditLog\personaActi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Paquete_Usuarios\cliente;
use App\Models\Paquete_Usuarios\proveedor;
use App\Models\Paquete_Usuarios\usuario;
use App\Notifications\CustomResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;


// use App\Models\personaSession;

class Persona extends Authenticatable implements CanResetPassword
{
    //

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use CanResetPasswordTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = "persona";
     protected $primaryKey = "id";

    protected $fillable = [
        'nombre',
        'correo',
        'contrasena',
        'direccion',
        'telefono',
        'tipo'
    ];

    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    public function getEmailForPasswordReset()
    {
        return $this->correo;
    }

    public function routeNotificationForMail($notification)
     {
        return $this->correo;
     }

     public function sendPasswordResetNotification($token)
     {
         $this->notify(new CustomResetPassword($token));
     }

    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new \App\Notifications\CustomResetPassword($token));
    // }


    public function cliente()
    {
        return $this->hasOne(cliente::class, 'persona_id');
    }

    public function proveedor()
    {
        return $this->hasOne(proveedor::class, 'persona_id');
    }
    public function usuario()
    {
        return $this->hasOne(usuario::class, 'persona_id');
    }
    public function usuarioActi()
    {
        return $this->hasMany(personaActi::class, 'persona_id');
    }

    // public function sessions()
    // {
    //     return $this->hasMany(personaSession::class);
    // }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'contrasena',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    // protected function casts(): array
    // {
    //     return [
    //         // 'confirmacion_contrasena' => 'datetime',
    //                // 'contrasena' => 'hashed',

    //     ];
    // }

    /** @use HasFactory<\Database\Factories\UserFactory> */
    // use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
    *@var list<string>
     */
    // protected $table="persona";

    // protected $fillable = [
    //     'nombre',
    //     'correo',
    //     'contrasena',
    //     'direccion',
    //     'telefono',
    //     'tipo'
    // ];

    // public function getAuthPassword()
    // {
    //     return $this->contrasena;
    // }

    // public function getEmailForPasswordReset() {
    //     return $this->correo;
    // }

    // public function cliente(){
    //     return $this->hasOne(cliente::class, 'persona_id');
    // }

    // public function proveedor(){
    //     return $this->hasOne(proveedor::class, 'persona_id');
    // }
    // public function usuario(){
    //     return $this->hasOne(usuario::class, 'persona_id');
    // }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    // protected $hidden = [
    //     'contrasena',
    //     'remember_token',
    // ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    // protected function casts(): array
    // {
    //     return [
    //         // 'confirmacion_contrasena' => 'datetime',
    //                // 'contrasena' => 'hashed',

    //     ];
    // }

}
