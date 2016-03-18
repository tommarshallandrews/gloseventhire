<?php
use App\Cat;
use App\User;

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
Route::get('/', function () {
    return View::make('index');
});

//users
Route::controller('users', 'UsersController', array('getLogin' => 'users.login', 'getResend' => 'users.resend'));


Route::any('usernameCheck', function()
{   
    return View::make('usernameCheck');
 });

Route::any('emailCheck', function()
{
    return View::make('emailCheck');
 });

Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'UsersController@confirm'
]);



//products

Route::get('/products', [ 'as' => 'products.show', 'uses' => 'ProductsController@show' ]); //show all products

Route::get('/products/{catagory}/{type}/{range}', [ 'as' => 'products.show', 'uses' => 'ProductsController@show' ]);

Route::get('/products/details/{id}', [ 'as' => 'products.details', 'uses' => 'ProductsController@details' ]);



//orders

Route::get('/quote/new', [ 'as' => 'orders.newquote', 'uses' => 'OrdersController@newquote' ]);

Route::get('/quote/{id}', [ 'as' => 'orders.show', 'uses' => 'OrdersController@show' ]);






Route::get('/orders', [ 'as' => 'orders.index', 'uses' => 'OrdersController@index' ]);

Route::post('/orders/edit', [ 'as' => 'orders.edit', 'uses' => 'OrdersController@edit' ]);

Route::post('/orders/updateReturn', [ 'as' => 'orders.updateReturn', 'uses' => 'OrdersController@updateReturn' ]);

Route::post('/orders/updateDates', [ 'as' => 'orders.updateDates', 'uses' => 'OrdersController@updateDates' ]);

Route::post('/orders/updateDelivery', [ 'as' => 'orders.updateDelivery', 'uses' => 'OrdersController@updateDelivery' ]);

//navigation


//Route::get('/topNavigation', [ 'as' => 'navigation.index', 'uses' => 'NavigationController@index' ]);

View::composer('masters.navigation', function($view)
{   


    //$view->with('ordersOpen', Order::where('user_id','=', $user_id)->where('status', '=', 'open')->first()); 
    $type = Cat::with('types')->orderby('name')->get(); 
    //dd($cat);
    $view->with(['cats'=> $type, 'getOrder' => app('App\getOrder')]);



});

//Route::resource('products', 'ProductsController');


Route::get('/test', function () {
    return View::make('results');
});

Route::get('/content', function () {
    return View::make('content');
});

Route::controller('users', 'UsersController', array('getLogin' => 'users.login', 'getResend' => 'users.resend'));

Route::resource('cutlery', 'CutlerysController');

