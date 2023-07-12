<?php

use Illuminate\Support\Facades\Route;

use App\Html\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('login', 'App\Http\Controllers\LoginController@login_form'); 
Route::post('login', 'App\Http\Controllers\LoginController@do_login');

Route::get('register', 'App\Http\Controllers\LoginController@register_form'); 
Route::post('register', 'App\Http\Controllers\LoginController@do_register');

Route::get('logout', 'App\Http\Controllers\LoginController@logout'); 

Route::get('home', 'App\Http\Controllers\MainController@home');
Route::get('news', 'App\Http\Controllers\MainController@news');
Route::get('get-news', 'App\Http\Controllers\MainController@get_news');
Route::get('profile', 'App\Http\Controllers\MainController@profile');
Route::get('fetch-games', 'App\Http\Controllers\MainController@fetch_games');
Route::get('remove-game/{game_id}', 'App\Http\Controllers\MainController@remove_game');

Route::get('search/{searchTerm}', 'App\Http\Controllers\MainController@search');
Route::get('show/{game_id}', 'App\Http\Controllers\MainController@show');
Route::post('save-game', 'App\Http\Controllers\MainController@save_game');
