<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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
    return view('components/view');
});

Route::get('/add', function () {
    return view('components/view');
});

Route::get('/series', function () {
    return view('components/view');
});

Route::get('/series/{id}', function () {
    return view('components/view');
});

Route::get('/series/{id}/edit', function () {
    return view('components/view');
});

Route::put('/series/{id}/edit', function () {
    return view('components/view');
});

Route::get('/search/{key}={value}', function () {
    return view('components/view');
});



Route::get('/movies', function () {
    return view('components/view');
});

Route::get('/movies/{id}', function () {
    return view('components/view');
});

Route::get('/movies/{id}/edit', function () {
    return view('components/view');
});


Route::get('/file',function(Request $request){
	$path=$request->file('image')->store('local');
	return $path;

});

Route::prefix('/v.1/api')->group(function(){

	Route::get('/',function(){
		$welcome = "Welcome to Imbd-api If you need see all series or all movies , use: GET /v.1/api/series or GET /v.1/api/movies,  Add new resource POST /v.1/api/{series || movies} fields : title=String ,release=YYYY-MM-DD ,category=['Action','Adventure','Comedy','Drama','Terror','Romance','Other'] ,actors=String ,directors=String ,Read resource GET /v.1/api/{series||movies}/{id} id= Number , Find Resource GET /v.1/api/{series||movies}/{title,category,rating,release} = {value} , Delete resource DELETE /v.1/api/{series||movies}/{id} Before Begining use at command line: php artisan migrate --seed ";

		return response()->json($welcome,200);
		});

	Route::get('/movies','MoviesController@index');
	Route::post('/movies','MoviesController@store');
	Route::get('/movies/{id}','MoviesController@show')->where('id', '[0-9]+');
	Route::get('/movies/{key}={value}','MoviesController@search')->where('key','[A-Za-z]+');
	Route::put('/movies/{id}','MoviesController@update')->where('id', '[0-9]+');
	Route::delete('/movies/{id}','MoviesController@destroy')->where('id', '[0-9]+');

	Route::get('/series','SeriesController@index');
	Route::post('/series','SeriesController@store');
	Route::get('/series/{id}','SeriesController@show')->where('id', '[0-9]+');
	Route::get('series/{key}={value}','SeriesController@search')->where('key','[A-Za-z]+');
	Route::put('/series/{id}','SeriesController@update')->where('id', '[0-9]+');
	Route::delete('/series/{id}','SeriesController@destroy')->where('id', '[0-9]+');


});







Route::fallback(function(){
	return response()->json('Not Found Resource',404);
});


