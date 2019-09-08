<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', 'UserController@index');

Route::get('/bbs', 'BbsController@index');
Route::post('/bbs', 'BbsController@create');