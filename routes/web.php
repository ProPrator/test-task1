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

Route::get('/', 'MedicinesController@main');

Route::get('/medicines', 'MedicinesController@showAll')->name('medicines');
Route::get('/medicines/deleted/{id}', 'MedicinesController@deleted');
Route::get('/medicines/visible/{id}', 'MedicinesController@visible');
Route::get('/medicines/edit/{id}', 'MedicinesController@edit');
Route::post('/medicines/edit/{id}', 'MedicinesController@save');



Route::get('/substances', 'SubstancesController@showAll')->name('substances');
Route::get('/substances/deleted/{id}', 'SubstancesController@deleted');
Route::get('/substances/visible/{id}', 'SubstancesController@visible');
Route::get('/substances/edit/{id}', 'SubstancesController@edit');
Route::post('/substances/edit/{id}', 'SubstancesController@save');
