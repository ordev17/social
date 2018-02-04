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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{username}', 'ProfileControler@profile');
Route::post('/profile/message', 'ProfileControler@message');
Route::post('/profile/message/{message}/reaction', 'ProfileControler@messageReaction');
Route::post('/follow/{user}', 'FollowersControler@follow');

Route::resource('posts', 'PostsControler');
Route::get('/reactions', 'ProfileControler@reactions');
Route::get('/inbox', 'ProfileControler@inbox');
Route::get('/ads', 'AdsController@get');
Route::get('/ads/display', 'AdsController@displayAd');
Route::post('/ads/interest/{catID}/save', 'AdsController@saveInterest');