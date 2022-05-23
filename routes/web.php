<?php

use App\Http\Controllers\UsersController;
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

Route::resource('users', 'UsersController')->only('index');
//create
Route::get('users/create', 'UsersController@create')->name('users.create');
Route::post('users/create', 'UsersController@store')->name('users.store');
//update
Route::get('users/update/{id}', 'UsersController@show')->name('users.show');
Route::post('users/update/{id}', 'UsersController@edit')->name('users.edit');
//delete
Route::get('users/delete/{id}', 'UsersController@destroy')->name('users.destroy');
