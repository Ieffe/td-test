<?php

use App\Http\Controllers\mainController;
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
    return redirect('/main/');
});

Route::resource('main', 'App\Http\Controllers\mainController');
Route::get('search', 'App\Http\Controllers\otherController@search')->name('search');
Route::get('top', 'App\Http\Controllers\otherController@bestAuthor')->name('best');
Route::get('main/retrieve/{authId}','App\Http\Controllers\otherController@getBookAjax');


