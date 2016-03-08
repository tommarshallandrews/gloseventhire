<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cat;
use App\Type;
use App\Range;
use App\Product;
use App\Order;
use App\User;
use View;
use Input;
use Auth;
use Session;
use Redirect;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //return "hello";

        //forget current order session
        if (Auth::check()){
            $user_id = Auth::user()->id;
            } else {
            $user_id = 0;
            }

            //$view->with('ordersOpen', Order::where('user_id','=', $user_id)->where('status', '=', 'open')->first()); 
            $type = Cat::with('types')->orderby('name')->get(); 
            $order = 28;
            //dd($cat);
            //$view->with(['cats'=> $type , 'order' => $order]);

            return View::make('masters.navigation', compact('type'));

        }



}
