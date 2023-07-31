<?php

use App\Livewire\Forms\PostForm;
use function Livewire\Volt\{state};
use function Livewire\Volt\{form};
use function Livewire\Volt\{action};

define('TMDB_ENDPOINT', config('services.tmdb.endpoint'));
define('API_KEY', config('services.tmdb.api'));

$header = [
  'accept' => 'application/json',
];
$query = 'love';
$movieSearchArr;

state(['tag' => $query]);
state(['value']);

function getMovieSearchArr($value) {
  $movieSearchArr = Http::withHeaders($header)->get(TMDB_ENDPOINT.'search/movie', [
    'api_key' => API_KEY,
    'query' => $value,
  ])['results'];
}

state(['movieSearchArr' => fn () => $movieSearchArr]);

$changeEvent = function($value){
  getMovieSearchArr($value);
}

?>

<div>
  <!-- trix CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />

  <!-- search box -->
  <form>
      <input type="text" wire:change="changeEvent($event.target.value)"/>

      <button>Submit</button>
  </form>

  <!-- movie lists loop -->
  @foreach($movieSearchArr as $movieDataArr)
    <livewire:movie-list-card :movieDataArr="$movieDataArr" :tag="$tag" :wire:key="$loop->index"/>
  @endforeach

  <!-- trix JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
</div>
