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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::auth();

// Tasks controllers

Route::get('/tasks', 'TaskController@index')->name('all_tasks');

Route::post('/task', 'TaskController@store')->name('create_task');

Route::delete('/task/{taskId}', 'TaskController@destroy')->name('delete_task');