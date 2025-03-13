<?php

use App\Controllers\UserController;
use App\Controllers\ProjetController;
use App\Controllers\AuthController;
use App\Routes\Route;

Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');
Route::get('/user/show', 'UserController@show');
Route::get('/user/edit', 'UserController@edit');
Route::post('/user/edit', 'UserController@update');
Route::post('/user/delete', 'UserController@delete');

Route::get('/', 'AuthController@index'); 

Route::get('/projet/show', 'ProjetController@show');
Route::get('/projet/create', 'ProjetController@create');
Route::post('/projet/create', 'ProjetController@store');
Route::get('/projet/edit', 'ProjetController@edit');
Route::post('/projet/edit', 'ProjetController@update');
Route::post('/projet/delete', 'ProjetController@delete');

Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');

Route::dispatch();