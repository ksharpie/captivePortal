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

/*
    Routes used to view items which exist
 */

Route::get('/', 'AdvertisementsController@index')->middleware('auth');
Route::get('/home', 'AdvertisementsController@index')->middleware('auth');
Route::get('/stores', 'StoresController@index')->middleware('auth');

/*
    Routes used to view individual items
 */

 Route::get('/advertisements/{advertisement}', 'AdvertisementsController@view')->middleware('auth');
 Route::get('/stores/{store}', 'StoresController@view')->middleware('auth');


/*
    Routes used to create items
 */
Route::post('/new-advertisement', 'AdvertisementsController@create')->middleware('auth');

Route::post('/new-store', 'StoresController@create')->middleware('auth');

Route::get('/new-advertisement', function () {
    return view('advertisements.new');
})->middleware('auth');

Route::get('/new-store', function () {
    return view('stores.new');
})->middleware('auth');

/*
    Routes used to edit items
 */

 Route::patch('/edit-advertisement/{advertisement}', 'AdvertisementsController@edit')->middleware('auth');

 Route::patch('/edit-store/{store}', 'StoresController@edit')->middleware('auth');


/*
    Routes used to delete items
 */
Route::get('/advertisements/delete/{advertisement}', 'AdvertisementsController@delete')->middleware('auth');
Route::get('/stores/delete/{store}', 'StoresController@delete')->middleware('auth');


Auth::routes();

// Route::get('/', 'HomeController@index')->name('advertisements');
