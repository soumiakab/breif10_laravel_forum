<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;


Route::resource('/admin/films', FilmController::class);
Route::resource('/users', CommentController::class);

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

Route::get('/', 'App\Http\Controllers\HomeController@index');

Auth::routes();

Route::get('/admin', 'App\Http\Controllers\HomeController@handleAdmin')->name('admin.route')->middleware('admin');
Route::get('/user', 'App\Http\Controllers\CommentController@index')->name('user');
// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

