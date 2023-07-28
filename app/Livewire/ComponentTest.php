<?php

namespace App\Livewire;

use Livewire\Component;

class ComponentTest extends Component
{
    public $count = 0;

    public function increment(){
      $this->count++;
    }

    public function decrease(){
      $this->count--;
    }

    public function render()
    {
        return view('livewire.component-test');
    }
}
