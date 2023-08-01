<?php

use App\Livewire\Forms\PostForm;
use function Livewire\Volt\{state};
use function Livewire\Volt\{form};
use function Livewire\Volt\{action};

state(['inputValue']);
state(['movieSearchArr' => []]);
state(['tag']);
state(['header' => [
  'accept' => 'application/json',
]]);

$getSearchMovieLists = function(){
  $this->movieSearchArr = Http::withHeaders($this->header)->get(config('services.tmdb.endpoint').'search/movie', [
    'api_key' => config('services.tmdb.api'),
    'query' => $this->inputValue,
  ])['results'];
  
  $this->tag = $this->inputValue;

  // dump($this->movieSearchArr);
};

$onSubmit = function(){
  $this->getSearchMovieLists();
};

$onChange = function(){
  $this->getSearchMovieLists();
};

?>

<section>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- search box -->
  <form wire:submit.prevent="onSubmit">
      <input type="text" wire:model="inputValue" wire:change="onChange" />

      <button>Submit</button>
  </form>

  @foreach($movieSearchArr as $movieDataArr)
  <div class="bg-white w-full shadow rounded-lg mt-3 p-6 cursor-pointer">
  <!-- @dump($movieDataArr) -->

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