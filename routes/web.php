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

//Base list routes
Route::get('/', 'Account@list')->name('index');
Route::get('/list', 'Account@list');

// Create accoun routes
Route::get('create', 'Account@accountCreationForm')->name('accountCreationForm');
Route::post('create', 'Account@create')->name('createAccount');

// Edit account routes
Route::get('edit/{id}','Account@showEditForm')->name('accountEditForm');
Route::post('edit/{id}', 'Account@update')->name('updateAccount');

// Delete account routes
Route::get('delete/{id}', 'Account@delete')->name('delete');
