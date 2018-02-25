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

Route::get('/', 'JobController@create');
Route::get('/jobs', 'JobController@show');
Route::post('/jobs', 'JobController@store');
Route::get('/jobs/{status}/{token}', 'JobController@changeStatus');


