<?php

# GitHubアカウントでログインへのリンクを表示
Route::get('/', function () {
    return view('welcome');
});
# GitHubアカウント連携用の'User'フォルダ下のUserController。下の(Laravelデフォルトの)userとは別物
Route::post('user', 'User\UserController@updateUser');
Route::get('github', 'Github\GithubController@top');
Route::post('github/issue', 'Github\GithubController@createIssue');
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

# Laravelが最初から用意してあるmigrationを利用したuser
Route::get('/user', 'UserController@index');

Route::get('/bbs', 'BbsController@index');
Route::post('/bbs', 'BbsController@create');

# 画像アップロード
Route::get('/home', 'HomeController@index');
Route::post('/upload', 'HomeController@upload');
