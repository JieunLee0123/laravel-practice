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

state(['tag' => $query]);
state(['value']);

$movieSearchArr = Http::withHeaders($header)->get(TMDB_ENDPOINT.'search/movie', [
  'api_key' => API_KEY,
  'query' => $query,
])['results'];


state(['movieSearchArr' => fn () => $movieSearchArr]);


?>

<div>
  <!-- search box -->
  <form>
      <input type="text" wire:change="changeEvent($event.target.value)"/>

      <button @click="alert('hi')">Submit</button>
      <div x-on:click="alert('Hello World!')">hi</div>
  </form>

  <!-- movie lists loop -->
  @foreach($movieSearchArr as $movieDataArr)
    <livewire:movie-list-card :movieDataArr="$movieDataArr" :tag="$tag" :wire:key="$loop->index"/>
  @endforeach
</div>
