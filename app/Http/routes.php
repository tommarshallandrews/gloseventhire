<?php
use App\Cat;

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


//products
Route::get('/products/{catagory}/{type}/{range}', [ 'as' => 'products.show', 'uses' => 'ProductsController@show' ]);

Route::get('/products/details/{id}', [ 'as' => 'products.details', 'uses' => 'ProductsController@details' ]);



//orders
Route::get('/orders', [ 'as' => 'orders.index', 'uses' => 'OrdersController@index' ]);

Route::get('/quote/{id}', [ 'as' => 'orders.show', 'uses' => 'OrdersController@show' ]);

Route::get('/quote/new', [ 'as' => 'orders.newquote', 'uses' => 'OrdersController@newquote' ]);

Route::post('/orders/edit', [ 'as' => 'orders.edit', 'uses' => 'OrdersController@edit' ]);


//navigation


//Route::get('/topNavigation', [ 'as' => 'navigation.index', 'uses' => 'NavigationController@index' ]);

View::composer('masters.navigation', function($view)
{   

if (Auth::check()){
    $user_id = Auth::user()->id;
    } else {
    $user_id = 0;
    }

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

