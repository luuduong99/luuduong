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

// Route::get('users', [UserController::class, 'index'])->name('users.list');
// Route::get('users', [UsersController::class, 'index'])->name('users.AddUsers');
Route::group(['prefix' => 'admin'], function ()
{
    // Route::get('users', [UsersController::class, 'read']);
    Route::get('/users', 'UsersController@index')->name('index');
    //create
    Route::get('/users/create', 'UsersController@create')->name('create');
    Route::post('/users/create', 'UsersController@createPost')->name('createPost');
    //update
    Route::get('/users/update/{id}', 'UsersController@update')->name('update');
    Route::post('/users/update/{id}', 'UsersController@updatePost')->name('updatePost');
    //delete
    Route::get('/users/delete/{id}', 'UsersController@delete')->name('delete');
});
