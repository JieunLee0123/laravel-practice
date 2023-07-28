<?php

namespace App\Livewire;

use Livewire\Component;

class MovieDetailCard extends Component
{
    public array $movieDataArr;

    public function mount($movieDataArr = null){
        $this->movieDataArr = $movieDataArr;
    }

    public function render()
    {
        return view('livewire.components/movie-detail-card');
    }
}
