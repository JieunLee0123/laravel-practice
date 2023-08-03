<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class MovieSearchComponent extends Component
{
    public string $inputValue;

    public array $movieSearchArr;
    public string $tag;

    public array $header = [
      'accept' => 'application/json',
    ];

    public function getSearchMovieLists(){
        $this->movieSearchArr = Http::withHeaders($this->header)->get(config('services.tmdb.endpoint').'search/movie', [
          'api_key' => config('services.tmdb.api'),
          'query' => $this->inputValue,
        ])['results'];
        
        $this->tag = $this->inputValue;

        // dump($this->movieSearchArr);
    }

    public function submit() {
        $this->getSearchMovieLists();
    }

    public function onChange() {
        $this->getSearchMovieLists();
    }

    public function render() 
      {
          return view('livewire.movie-search-component');
      }
}
