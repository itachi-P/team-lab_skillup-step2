<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', 'UserController@index');

Route::get('/bbs', 'BbsController@index');
Route::post('/bbs', 'BbsController@create');

Route::get('github', 'Github\GithubController@top');
Route::post('github/issue', 'Github\GithubController@createIssue');
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::post('user', 'User\UserController@updateUser');

Route::get('/', 'HomeController@index');