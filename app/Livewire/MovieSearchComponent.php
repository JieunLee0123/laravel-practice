<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

define('TMDB_ENDPOINT', config('services.tmdb.endpoint'));
define('API_KEY', config('services.tmdb.api'));

class MovieSearchComponent extends Component
{
    /** @modelable */
    public string $inputValue;

    public array $movieSearchArr;
    public string $tag;

    public array $header = [
      'accept' => 'application/json',
    ];

    public function getSearchMovieLists(){
        $this->movieSearchArr = Http::withHeaders($this->header)->get(TMDB_ENDPOINT.'search/movie', [
          'api_key' => API_KEY,
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
