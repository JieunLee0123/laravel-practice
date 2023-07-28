<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// welcome
Route::get('/', function () {
    return view('welcome');
});

// waffle
Route::get('/waffle', \App\Livewire\Cookie::class);

// volt-test
Route::get('/volt', fn () => view('livewire.volt-test'));

// component-test
// Route::get('/component', fn () => view('livewire.component-test'));
Route::get('/component', \App\Livewire\ComponentTest::class);

// movie
Route::name('movie.')->group(function () {
  Route::get('/lists', [MovieController::class, 'getLists'])->name('lists');
  Route::get('/detail/{movie_id}', [MovieController::class, 'getDetail'])->name('detail');
});



