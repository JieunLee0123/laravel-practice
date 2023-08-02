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
          <input type="search" wire:model="inputValue" wire:change="onSubmit" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none" placeholder="Search Mockups, Logos..." required>
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
    <!-- @dump($movieDataArr) -->
    <div class="bg-white w-full shadow rounded-lg mt-3 p-6 cursor-pointer">
      <a href="/detail/{{ $movieDataArr['id'] }}">
        <div class="md:flex items-center">
            <div class="w-[20%] bg-yellow-50 rounded flex flex-shrink-0 items-center justify-center">
                <img src="https://image.tmdb.org/t/p/w500/{{ $movieDataArr['poster_path'] }}" alt="hexa-logo" tabindex="0" class="focus:outline-none w-full h-full" />
            </div>
            <div class="md:ml-6 md:mt-0 mt-4 w-full">
                <div class="flex items-center justify-between">
                    <p tabindex="0" class="focus:outline-none text-xl font-semibold leading-5 text-gray-800">{{ $movieDataArr['title'] }}</p>
                    <p tabindex="0" class="focus:outline-none text-xs leading-3 text-indigo-700 px-4 py-2 bg-indigo-100 rounded-full">{{ $tag }}</p>
                </div>
                <p tabindex="0" class="focus:outline-none text-sm pt-5 text-gray-600 ellipsis">{{ $movieDataArr['overview'] }}</p>
                <div tabindex="0" class="focus:outline-none mt-6 flex items-center justify-between">
                    <div class="flex items-center">
                        <p class="text-xs leading-3 text-gray-600  mr-4">#장르1</p>
                        <p class="text-xs leading-3 text-gray-600  mr-4">#장르2</p>
                        <p class="text-xs leading-3 text-gray-600  mr-4">#장르3</p>
                    </div>
                    <button role="button" aria-label="Rate" class="hover:bg-gray-100 focus:outline-none focus:ring-2  flex items-center p-1 border rounded-sm border-gray-200 cursor-pointer">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/list-svg1.svg" alt="like" />
                        <span class="text-xs leading-3 text-gray-600  pl-1">Rate {{ $movieDataArr['popularity'] }}</span>
                    </button>
                </div>
            </div>
        </div>
      </a>
    </div>
  @endforeach
</section>