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
$query = 'like';

state(['tag' => $query]);
state(['inputValue']);

$movieSearchArr = Http::withHeaders($header)->get(TMDB_ENDPOINT.'search/movie', [
  'api_key' => API_KEY,
  'query' => $query,
])['results'];

state(['movieSearchArr' => fn () => $movieSearchArr]);

$submit = function () {
  var_dump($this->inputValue);
}

?>

<div>
  <!-- search box -->
  <form wire:submit="submit">
      <input type="text" wire:model.live="inputValue" />

      <button>Submit</button>
  </form>

  <!-- movie lists loop -->
  @foreach($movieSearchArr as $movieDataArr)
    <livewire:movie-list-card :movieDataArr="$movieDataArr" :tag="$tag" :wire:key="$loop->index"/>
  @endforeach
</div>
