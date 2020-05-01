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


Auth::routes();


Route::get('/', 'Maincontroller@index')->name('home');
Route::get('/post/add', 'Maincontroller@create')->name('add');
Route::post('/posts', 'Maincontroller@store')->name('addpost');
Route::get('/post/{post}', 'Maincontroller@show')->name('show');
Route::get('/post/{post}/edit', 'Maincontroller@edit')->name('edit');
Route::get('/post/{post}/delete', 'Maincontroller@delete')->name('delete');
Route::put('/posts/{post}', 'Maincontroller@update')->name('update');



Route::group(['prefix' => ''],function () {
    Route::post('/posts', 'MainController@store')
        ->name('addpost')
        ->middleware('can:add-post');

    Route::put('/posts/{post}', 'MainController@update')
        ->name('update_message')
        ->middleware('can:update-post,post');
});
