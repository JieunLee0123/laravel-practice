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

	public array $genreArrReturn;

	// movie
    public function getMovie(){
        $tmdb_id = 436270;
		$movieData = Http::withHeaders($this->header)->get(TMDB_ENDPOINT.'movie/'.$tmdb_id, [
			'api_key' => API_KEY,
		]);

		// echo $movieData;
		return view('movie', compact('movieData'));
	}

	public function getGenre(int $id){ // id 입력시 장르 출력
		// echo $id." ";
		$genresArr = Http::withHeaders($this->header)->get(TMDB_ENDPOINT.'genre/movie/list', [
			'api_key' => API_KEY,
			'language' => 'ko',
		])['genres'];

		$genre = array_filter($genresArr, function ($var) use ($id) {
			return ($var['id'] == $id);
		})[0]['name'];

		return $genre;
	}

	public function loopGetGenre(array $genreIdArr){
		// $this->getGenre(99);
		foreach($genreIdArr as $id){
			$this->getGenre($id);
			// echo $id." ";
		}
	}
	
	// now-playing
	public function getNowPlaying(){
		$moviesResArr = Http::withHeaders($this->header)->get(TMDB_ENDPOINT.'movie/now_playing', [
			'api_key' => API_KEY,
			'language' => 'ko',
			'page' => 5,
			'region' => 'KR'	
		])['results'];

		// foreach($moviesResArr as $movieData){
		// 	$genreIdArr = $movieData['genre_ids'];

		// 	if(count($genreIdArr)) {
		// 		echo json_encode($genreIdArr);
		// 	}

		// 	// $genreArrReturn $this->loopGetGenre($genreIdArr);
		// }

		// $genreIdArr = $moviesResArr[0]['genre_ids'];
		// $genre = $this->loopGetGenre($genreIdArr);

		$tag = "Now Playing";
		
		// echo json_encode($genre);
		// echo json_encode($moviesResArr)
		return view('livewire.now-playing')
		->with(compact('moviesResArr'))
		->with(compact('tag'));
		// ->with(compact('genre'));
	}
}
