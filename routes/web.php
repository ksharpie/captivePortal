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


Route::get('/', function () {
    // Only authenticated users may enter...
    return view('advertisements');
})->middleware('auth');

Route::get('/stores', function () {
    // Only authenticated users may enter...
    return view('stores');
})->middleware('auth');

Route::post('/advertisements', function () {
    // Only authenticated users may enter...
    return view('advertisements');
})->middleware('auth');

Route::post('/stores', function () {
    // Only authenticated users may enter...
    return view('stores');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
