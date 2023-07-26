<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    //
    public function movie(){
        $tmdb_id = 436270;
		$movieData = Http::asJson()->get(config('services.tmdb.endpoint').'movie/'.$tmdb_id.'?api_key='.config('services.tmdb.api'));
		
		return view('movie', compact('movieData'));
	}
}
