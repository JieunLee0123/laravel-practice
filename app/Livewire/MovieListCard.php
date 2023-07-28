<?php

namespace App\Livewire;

use Livewire\Component;

class MovieListCard extends Component
{
    public array $movieDataArr;
    public string $tag;

    public function mount($movieDataArr = null, $tag=null)
    {
        $this->movieDataArr = $movieDataArr;
        $this->tag = $tag;
    }
    
    public function render()
    {
        return view('livewire.components/movie-list-card');
    }
}
