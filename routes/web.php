<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/',['as' => 'home','uses' => 'HomeController@index']);
Route::get('/abbreviator',['as' => 'home.test','uses' => 'HomeController@index']);
Route::post('/abbreviator',['as' => 'home.test','uses' => 'HomeController@test']);
Route::get('/parse',['as' => 'parser','uses' => 'ParserFileTxtController@readFile']);


