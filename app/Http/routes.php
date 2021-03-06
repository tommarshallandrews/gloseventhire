<?php
use App\Cat;
use App\User;
use App\Group;
use App\Faq;
use App\Page;

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

Route::get('/hello', function () {
    return View::make('test');
});



Route::get('/', function () {
    return View::make('index');
    Session::forget('keywords');
    Session::forget('title');
});


Route::get('/contact-us', function () {
    Session::flash('keywords', 'contact us');
    Session::flash('title', 'Contact us');
    return View::make('contact');

});


Route::get('/faq', function () {
    $faqs = faq::all();
    //return $faqs;
    Session::flash('keywords', 'faq, questions, queries');
    Session::flash('title', 'FAQ');
    return View::make('faqs', compact('faqs'));

});


Route::get('/page/{slug}', function ($slug) {

    $content = Page::where('slug', $slug)->first();
    Session::flash('keywords', $content->heading);
    Session::flash('title', $content->heading);
    return View::make('page', compact('content'));
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

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');



//products
Route::get('/products/search', [ 'as' => 'products.search', 'uses' => 'ProductsController@search' ]);

Route::get('/products/linen/{group}/{colour}', [ 'as' => 'products.showLinen', 'uses' => 'ProductsController@showLinen' ]);

Route::get('/products', [ 'as' => 'products.show', 'uses' => 'ProductsController@show' ]); //show all products

Route::get('/products/details/{id}/{colourslug?}', [ 'as' => 'products.details', 'uses' => 'ProductsController@details' ]);

Route::get('/products/{catagory}/{group}/{range}', [ 'as' => 'products.show', 'uses' => 'ProductsController@show' ]);


//Route::any('thanks', function()
//{
  //  return View::make('thanks');
 //});

//orders

Route::get('/quote/new', [ 'as' => 'orders.newquote', 'uses' => 'OrdersController@newquote' ]);

Route::get('/quote/{id}', [ 'as' => 'orders.show', 'uses' => 'OrdersController@show' ]);

Route::get('/listing/{id}', [ 'as' => 'orders.listing', 'uses' => 'OrdersController@show' ]);

Route::get('/address/{id}', [ 'as' => 'orders.address', 'uses' => 'OrdersController@address' ]);


//orders

Route::get('/orders', [ 'as' => 'orders.index', 'uses' => 'OrdersController@index' ]);

Route::post('/orders/edit', [ 'as' => 'orders.edit', 'uses' => 'OrdersController@edit' ]);

Route::post('/orders/updateReturn', [ 'as' => 'orders.updateReturn', 'uses' => 'OrdersController@updateReturn' ]);

Route::post('/orders/updateDates', [ 'as' => 'orders.updateDates', 'uses' => 'OrdersController@updateDates' ]);

Route::post('/orders/updateDelivery', [ 'as' => 'orders.updateDelivery', 'uses' => 'OrdersController@updateDelivery' ]);

Route::post('/orders/getQuote', [ 'as' => 'orders.getQuote', 'uses' => 'OrdersController@getQuote' ]);

Route::post('/orders/updateAddress', [ 'as' => 'orders.updateAddress', 'uses' => 'OrdersController@updateAddress' ]);

//navigation


//Route::get('/topNavigation', [ 'as' => 'navigation.index', 'uses' => 'NavigationController@index' ]);

View::composer('masters.navigation', function($view)
{   
    $group = Cat::with('groups')->orderby('name')->get(); 

    //dd($group);
    $view->with(['cats'=> $group, 'getOrder' => app('App\getOrder')]);
});


View::composer('masters.header', function($view)
{   
    $view->with(['getMeta' => app('App\getMeta')]);
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

