<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/homepage', [HomePageController::class, 'index'])->name('home.index');


Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');

Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlist.index');

// to show songs belonging to a genre :
Route::get('/genres/{genreId}', [GenreController::class, 'showSongs'])->name('genres.show');

// to handle the creation of playlists :
Route::get("/playlists/create" , array(PlaylistController::class, "create"))->name("playlists.create");
Route::post("/playlists" , array(PlaylistController::class, "store"))->name("playlists.store");
Route::get('/playlists/{playlist}/edit', array(PlaylistController::class, "edit"))->name('playlists.edit');
Route::put('/playlists/{playlist}/update', array(PlaylistController::class, "update"))->name('playlists.update');
Route::delete('/playlists/{playlist}/destroy', array(PlaylistController::class, "destroy"))->name('playlists.destroy');

// to point to the controller method that will display the form and handle the submission.
Route::post('/playlist/{playlist}/add', [PlaylistController::class, 'addSongs'])->name('playlists.addSongs');

Route::get('/playlists/{playlist}/add', [PlaylistController::class, 'showAddSongsForm'])->name('playlists.add');
Route::get('/playlists/{playlist}', [PlaylistController::class, 'show'])->name('playlists.show');

// Authentication Routes
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/login', [HomePageController::class, 'index'])->middleware('auth');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);