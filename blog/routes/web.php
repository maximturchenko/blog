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
Route::get('/post/{post}/edit', 'Maincontroller@edit')->name('home');
Route::get('/post/{post}/delete', 'Maincontroller@delete')->name('home');
Route::put('/posts/{post}', 'Maincontroller@update')->name('home');


Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');



