<?php

use App\Routes\Route;

Route::get('/user/create', 'User Controller@create');
Route::post('/user/create', 'User Controller@store');
Route::get('/user/show', 'User Controller@show');
Route::get('/user/edit', 'User Controller@edit');
Route::post('/user/edit', 'User Controller@update');
Route::post('/user/delete', 'User Controller@delete');

Route::get('/', 'ProjetController@index');

Route::get('/projet/show', 'ProjetController@show');
Route::get('/projet/create', 'ProjetController@create');
Route::post('/projet/create', 'ProjetController@store');
Route::get('/projet/edit', 'ProjetController@edit');
Route::post('/projet/edit', 'ProjetController@update');
Route::post('/projet/delete', 'ProjetController@delete');

Route::dispatch();
