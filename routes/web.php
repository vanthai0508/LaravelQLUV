<?php

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
    return view('welcome');
});
Route::get('user/create','App\Http\Controllers\UserController@createView');

Route::post('user/create','App\Http\Controllers\UserController@create');

Route::get('user/login','App\Http\Controllers\UserController@loginView');

Route::post('user/login','App\Http\Controllers\UserController@login');

Route::get('cv/apply','App\Http\Controllers\CVController@apply');

Route::post('cv/apply','App\Http\Controllers\CVController@apply');



