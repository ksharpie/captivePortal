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

use Illuminate\Http\Request;

// Routes used to view items which exist
Route::get('/', 'AdvertisementsController@index')->middleware('auth');
Route::get('/home', 'AdvertisementsController@index')->middleware('auth');
Route::get('/stores', 'StoresController@index')->middleware('auth');
Route::get('/users', 'UsersController@index')->middleware('auth');
Route::get('/locations', 'LocationsController@index')->middleware('auth');

// Routes used to view individual items
Route::get('/advertisements/{advertisement}', 'AdvertisementsController@view')->middleware('auth');
Route::get('/stores/{store}', 'StoresController@view')->middleware('auth');
Route::get('/users/{user}', 'UsersController@view')->middleware('auth');
Route::get('/locations/{location}', 'LocationsController@view')->middleware('auth');

// Routes used to create items
Route::get('/new-advertisement', 'AdvertisementsController@loadCreateAdvertisementPage')->middleware('auth');
Route::get('/new-store', 'StoresController@loadCreateStorePage')->middleware('auth');
Route::get('/new-user', 'UsersController@loadCreateUserPage')->middleware('auth');
Route::get('/new-location', 'LocationsController@loadCreateLocationPage')->middleware('auth');

Route::post('/new-advertisement', 'AdvertisementsController@create')->middleware('auth');
Route::post('/new-store', 'StoresController@create')->middleware('auth');
Route::post('/new-user', 'UsersController@create')->middleware('auth');
Route::post('/new-location', 'LocationsController@create')->middleware('auth');

// Routes used to edit items
Route::patch('/edit-advertisement/{advertisement}', 'AdvertisementsController@edit')->middleware('auth');
Route::patch('/edit-store/{store}', 'StoresController@edit')->middleware('auth');
Route::patch('/edit-user/{user}', 'UsersController@edit')->middleware('auth');
Route::patch('/edit-locaiton/{location}', 'LocationsController@edit')->middleware('auth');

// Routes used to delete items
Route::get('/advertisements/delete/{advertisement}', 'AdvertisementsController@delete')->middleware('auth');
Route::get('/stores/delete/{store}', 'StoresController@delete')->middleware('auth');
Route::get('/users/delete/{user}', 'UsersController@delete')->middleware('auth');
Route::get('/locations/delete/{location}', 'LocationsController@delete')->middleware('auth');

Route:: get('/captiveportal', 'CaptivePortalController@index');

Auth::routes();
