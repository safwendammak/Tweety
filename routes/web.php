<?php
//\Illuminate\Support\Facades\DB::listen(function ($query){
//    var_dump($query->sql, $query->bindings);
//});
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets', 'TweetsController@store');
    Route::post('profiles/{user:username}/follow','FollowsController@store')->name('follow');
    Route::get('profiles/{user:username}/edit','ProfilesController@edit');
    Route::get('/profiles/{user:username}','ProfilesController@show')->name('profile');
    Route::patch('/profiles/{user:username}','ProfilesController@update')->name('profile');
    Route::get('/explore','ExploreController@index');
});

Auth::routes();
