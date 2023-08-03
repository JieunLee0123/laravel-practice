<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class MovieListCard extends Component
{
    #[Reactive] 
    public array $movieDataArr;
    public string $tag;

    public function render()
    {
        return view('livewire.components/movie-list-card', [
            'movieDataArr' => $this->movieDataArr,
            'tag' => $this->tag,
        ]);
    }
}
