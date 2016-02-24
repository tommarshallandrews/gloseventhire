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

Route::resource('products', 'ProductsController');


Route::get('/test', function () {
    return View::make('results');
});

Route::get('/content', function () {
    return View::make('content');
});

Route::controller('users', 'UsersController', array('getLogin' => 'users.login', 'getResend' => 'users.resend'));

Route::resource('cutlery', 'CutlerysController');

