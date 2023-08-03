<?php

use App\Livewire\Forms\PostForm;
use function Livewire\Volt\{state};
use function Livewire\Volt\{form};
use function Livewire\Volt\{action};
use function Livewire\Volt\{mount};

state(['header' => [
  'accept' => 'application/json',
]]);

state(['inputValue' => '']);
state(['movieListsArr' => []]);
state(['tag']);
state(['BtnTargetValue' => 'now_playing']);

$getSearchMovieLists = function(){
  $this->movieListsArr = Http::withHeaders($this->header)->get(config('services.tmdb.endpoint').'search/movie', [
    'api_key' => config('services.tmdb.api'),
    'query' => $this->inputValue,
  ])['results'];
  
  $this->tag = $this->inputValue;

  // dump($this->movieListsArr);
};

$getMovieLists = function(){
  $this->movieListsArr = Http::withHeaders($this->header)->get(config('services.tmdb.endpoint').'movie/'.$this->BtnTargetValue, [
    'api_key' => config('services.tmdb.api'),
    'language' => 'ko',
    'page' => 5,
    'region' => 'KR'	
  ])['results'];
  
  $this->tag = $this->BtnTargetValue;

  // dump($this->movieListsArr);
};

mount(fn () => $this->getMovieLists());

$onSubmit = function(){
  if($this->inputValue == "") {
    $this->BtnTargetValue = 'now_playing';
    $this->getMovieLists();
  } else {
    $this->BtnTargetValue = '';
    $this->getSearchMovieLists();
  }
};

$onClickBtn = function($BtnTargetValue){
  $this->BtnTargetValue = $BtnTargetValue;
  $this->inputValue = '';

  $this->getMovieLists();
}

?>

<section>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- search box -->
  <form wire:submit.prevent="onSubmit">   
      <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
      <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
              </svg>
          </div>
          <input type="search" wire:model.debounce.0ms="inputValue" wire:change="onSubmit" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none" placeholder="Search Mockups, Logos..." required>
          <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
      </div>
  </form>

  <!-- btns -->
  <div class="flex flex-row-reverse m-3">
    <button type="button" wire:click.prevent="onClickBtn($event.target.value)" value="now_playing" class="{{ $BtnTargetValue == 'now_playing' ? 'bg-indigo-700 text-white' : '' }} focus:outline-none text-dark hover:text-white hover:bg-indigo-500 font-medium rounded-full text-sm px-5 py-2.5 ml-2">Now Playing</button>
    <button type="button" wire:click.prevent="onClickBtn($event.target.value)" value="popular" class="{{ $BtnTargetValue == 'popular' ? 'bg-indigo-700 text-white' : '' }} focus:outline-none text-dark hover:text-white hover:bg-indigo-500 font-medium rounded-full text-sm px-5 py-2.5 ml-2">Popular</button>
    <button type="button" wire:click.prevent="onClickBtn($event.target.value)" value="top_rated" class="{{ $BtnTargetValue == 'top_rated' ? 'bg-indigo-700 text-white' : '' }} focus:outline-none text-dark hover:text-white hover:bg-indigo-500 font-medium rounded-full text-sm px-5 py-2.5 ml-2">Top Rated</button>
    <button type="button" wire:click.prevent="onClickBtn($event.target.value)" value="upcoming" class="{{ $BtnTargetValue == 'upcoming' ? 'bg-indigo-700 text-white' : '' }} focus:outline-none text-dark hover:text-white hover:bg-indigo-500 font-medium rounded-full text-sm px-5 py-2.5 ml-2">Upcoming</button>
  </div>

  @foreach($movieListsArr as $movieDataArr)
    <livewire:movie-list-card key="{{ Str::random() }}" :$movieDataArr :$tag />
  @endforeach
</section>