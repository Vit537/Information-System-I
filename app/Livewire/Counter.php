<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    // public function render()
    // {
    //     return view('livewire.counter');
    // }



    public $count = 1;

    public function increment()
    {
        $this->count++;
        // dd('nuevo');
    }

    public function decrement()
    {
        $this->count--;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
