<?php

namespace App\Livewire;

use Livewire\Component;

class MovieLists extends Component
{
    public array $movieData;
    public string $tag;

    public function mount($movieData = null, $tag=null)
    {
        $this->movieData = $movieData;
        $this->tag = $tag;
    }
    
    public function render()
    {
        return view('livewire.components/movie-lists');
    }
}
