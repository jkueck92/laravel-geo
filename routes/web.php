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
    return view('auth.login');
});

Auth::routes();

/* profile and home */
Route::get('/profile', 'HomeController@edit')->name('profile.edit');
Route::patch('/profile', 'HomeController@update')->name('profile.update');
Route::get('/home', 'HomeController@index')->name('home');

/* continents */
Route::get('continents/trashed', 'ContinentController@trashed')->name('continents.trashed');
Route::delete('continents/delete/{id}', 'ContinentController@forceDelete')->name('continents.forceDelete');
Route::resource('continents', 'ContinentController');

/* countries */
Route::get('countries/trashed', 'CountryController@trashed')->name('countries.trashed');
Route::delete('countries/delete/{id}', 'CountryController@forceDelete')->name('countries.forceDelete');
Route::resource('countries', 'CountryController');

/* airports */
Route::get('airports/trashed', 'AirportController@trashed')->name('airports.trashed');
Route::delete('airports/delete/{id}', 'AirportController@forceDelete')->name('airports.forceDelete');
Route::resource('airports', 'AirportController');
