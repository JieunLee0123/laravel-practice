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

    public function getMovie(){
        $tmdb_id = 436270;
		$movieData = Http::withHeaders($this->header)->get(TMDB_ENDPOINT.'movie/'.$tmdb_id, [
			'api_key' => API_KEY,
		]);

		// echo $movieData;
		return view('movie', compact('movieData'));
	}

	public function getNowPlaying(){
		$moviesData = Http::withHeaders($this->header)->get(TMDB_ENDPOINT.'movie/now_playing', [
			'api_key' => API_KEY,
			'language' => 'ko',
			'page' => 5,
			'region' => 'KR'	
		])['results'];

		// echo json_encode($moviesData)
		return view('livewire.now-playing', compact('moviesData'));
	}
}
