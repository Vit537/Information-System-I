<?php

namespace App\Models\Paquete_Usuarios\Auth;


use App\Models\AuditLog\personaActi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Paquete_Usuarios\cliente;
use App\Models\Paquete_Usuarios\proveedor;
use App\Models\Paquete_Usuarios\usuario;

use App\Models\personaSession;

class Persona extends Authenticatable
{
    //

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = "persona";

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
    public function usuarioActi(){
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
          * @var list<string>
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
