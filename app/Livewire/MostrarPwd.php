<?php

namespace App\Livewire;

use Livewire\Component;

class MostrarPwd extends Component
{
     public $usuario;
    public $mostrarContrasena = false;


    public function render()
    {

        return view('livewire.mostrar-pwd');
    }

    public function toggleContrasena()
    {
        // dd('hola mundo');
        $this->mostrarContrasena = !$this->mostrarContrasena;
    }
}
