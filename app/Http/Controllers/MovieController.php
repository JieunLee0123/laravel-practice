<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
// use Illuminate\Http\Request;

define('TMDB_ENDPOINT', config('services.tmdb.endpoint'));
define('API_KEY', config('services.tmdb.api'));

class MovieController extends Controller
{
	public array $header = [
		'accept' => 'application/json',
	];

	// get movie detail
  public function getDetail(int $movie_id){
    $movieDataObj = Http::withHeaders($this->header)->get(TMDB_ENDPOINT.'movie/'.$movie_id, [
      'api_key' => API_KEY,
    ]);

    $movieDataArr = (array) json_decode($movieDataObj);

    // dump($movieDataArr['id']);
    return view('livewire.movie-detail-page')
    ->with(compact('movieDataArr'));
  }

	// get movie lists
	public function getLists(){
		$moviesResArr = Http::withHeaders($this->header)->get(TMDB_ENDPOINT.'movie/now_playing', [
			'api_key' => API_KEY,
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
