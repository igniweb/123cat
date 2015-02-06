<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('signin', ['middleware' => 'guest', 'as' => 'auth_signin', 'uses' => 'AuthController@signin']);
Route::get('signin/oauth', ['middleware' => 'guest', 'as' => 'auth_oauth', 'uses' => 'AuthController@oauth']);
Route::get('signout', ['middleware' => 'auth', 'as' => 'auth_signout', 'uses' => 'AuthController@signout']);

Route::group(['prefix' => 'backend', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', ['as' => 'admin', 'uses' => 'DashboardController@index']);
});
