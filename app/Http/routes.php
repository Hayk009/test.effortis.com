<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PostsController@index');

Route::get('/about', function () {
    return view('about');
});

Route::resource('lectures','LecturesController');
Route::get('lectures/download/{id}', 'LecturesController@download');
Route::get('lectures/active/{id}/{active}', 'LecturesController@active');

Route::resource('posts','PostsController');
Route::get('posts/active/{id}/{active}', 'PostsController@active');


Route::get('auth/login', 'Auth\AuthController@login');

Route::get('admin', function(){ return redirect('auth/login'); });

Route::post('auth/login', 'Auth\AuthController@doLogin');

Route::get('auth/logAuth', 'Auth\AuthController@logAuth');