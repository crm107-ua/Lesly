<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('songs', 'Api\SongController');
Route::resource('users', 'Api\UserController');
Route::resource('playlists', 'Api\PlaylistController');
Route::resource('generos', 'Api\GeneroController');
Route::resource('albums', 'Api\AlbumController');
Route::resource('eventos', 'Api\EventController');
