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

use App\Task;
use Illuminate\Http\Request;

/*
    Routes used to view items which exist
 */
Route::get('/', function () {
    return view('advertisements/list');
})->middleware('auth');

Route::get('/stores', function () {

    return view('stores/list');
})->middleware('auth');

/*
    Routes used to create items
 */
Route::post('/advertisements', function () {
    return view('advertisements');
})->middleware('auth');

Route::post('/stores', function () {
    return view('stores');
})->middleware('auth');

/*
    Routes used to edit items
 */
Route::put('/advertisements', function () {
    return view('advertisements');
})->middleware('auth');

Route::put('/stores', function () {
    return view('stores');
})->middleware('auth');

/*
    Routes used to delete items
 */
Route::delete('/advertisements', function () {
    return view('advertisements/list');
})->middleware('auth');

Route::delete('/stores', function () {
    return view('stores/list');
})->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
