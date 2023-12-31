<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
// use Illuminate\Http\Request;

class MovieController extends Controller
{
	public array $header = [
		'accept' => 'application/json',
	];

	// get movie detail
  public function getDetail(int $movie_id){
    $movieDataObj = Http::withHeaders($this->header)->get(config('services.tmdb.endpoint').'movie/'.$movie_id, [
      'api_key' => config('services.tmdb.api'),
    ]);

    $movieDataArr = (array) json_decode($movieDataObj);

    // dump($movieDataArr['id']);
    return view('livewire.movie-detail-page')
    ->with(compact('movieDataArr'));
  }

	// get movie lists
	public function getLists(){
		$moviesResArr = Http::withHeaders($this->header)->get(config('services.tmdb.endpoint').'movie/now_playing', [
			'api_key' => config('services.tmdb.api'),
			'language' => 'ko',
			'page' => 5,
			'region' => 'KR'	
		])['results'];

		$tag = "Now Playing";
    
    // dump($moviesResArr);
		return view('livewire.movie-lists-page')
		->with(compact('moviesResArr'))
		->with(compact('tag'));
	}
}
