<?php

use App\Controllers\HomeController; 
use App\Routes\Route; 

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/projet', 'ProjetController@index');
Route::get('/projet/create', 'ProjetController@create');
Route::get('/projet/create', 'ProjetController@store');
Route::get('/projet/edit', 'ProjetController@edit');
Route::get('/projet/edit', 'ProjetController@update');
Route::get('/projet/delete', 'ProjetController@delete');

Route::dispatch();
?>