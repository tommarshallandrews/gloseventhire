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

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //forget current order session
        session()->forget('order');
            //get all orders for a customer
        $orders = Order::with(['product' => function($query) {
                $query->with(['range', 'type']);
                }])
        ->where('user_id', '=',  Auth::user()->id, 'and')
        ->get();

        return View::make('users.dashboard', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {

         $details = Product::with('range','type')
        ->find($id);
        return View::make('details', compact('details'));
        return $details;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

         
    if(!Session::has('order')){
        $order_id = $id;
    } else {
        $order_id = Session::get('order');
    }

    //dd($order_id);

        //
        $order = Order::with(['product' => function($query) {
                $query->with(['range', 'type']);
                }])
        ->where('user_id', '=',  Auth::user()->id, 'and')
        ->where('id', $order_id)
        ->first();

        if(!$order){
            return "nothing here!";
        }
        
        Session::put('order', $order->id);
        //return $order;
        return View::make('quote', compact('order'));
        //return View::make('results');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


  

        public function create()
    {
        //
        if (!Auth::check()) {

            //create unregistered user and a new make for them
            $user = new User;
            $user->save();
            Auth::login($user);

        } 

            //create new make with seqeenced name and slug 
            $make = new Order;
            $make->user_id = Auth::user()->id;
            $make->save();


            //return $make->slug;

            return Redirect::action('WorkshopController@show', array($make->id));

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
            //check for integer in quantity
        if (!(Input::get('quantity') > 0 && Input::get('quantity') < 1000)) {
            Session::flash('type', "danger");
            Session::flash('message', "Please enter a quantity between 1 and 1000");
            return Redirect::back();
        }

        if (!Auth::check()) {

            //create unregistered user and a new make for them
            $user = new User;
            $user->save();
            Auth::login($user);

        } 

        if (!Session::has('order')){
            //create new make with seqeenced name and slug 
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->save();
            Session::put('order', $order->id);
        }

       $quantity = Input::get('quantity');
       $product_id = Input::get('product_id');

    $order_id = Order::find(Session::get('order'));

    //return $product_id;
    $order_id->product()->detach($product_id);
    $order_id->product()->attach($product_id, ['quantity' => $quantity]); 

    //push productto order session
    //Session::put('order.product', $product_id);

    //return(Session::get('order.product'));

    Session::flash('message', $quantity . " of these have been added to your quote");
    Session::flash('type', "success");
    return Redirect::back();
    
    //return $quantity;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $quantity, $id)
    {
        return $quantity;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
