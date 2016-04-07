<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cat;
use App\Group;
use App\Range;
use App\Product;
use App\Order;
use App\User;
use View;
use Input;
use Auth;
use Session;
use Redirect;
use Mail;
use Config;

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
                $query->with(['range', 'group']);
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
        $details = Product::with('range','group')
        ->find($id);
        return View::make('details', compact('details'));

    }


    public function address($id)
    {    
        $order = Order::with('user')
        ->find($id);
        return View::make('address', compact('order'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    


    public function show(request $request)
    {   

      // return Auth::user()->level;

    if(!Auth::check()){
    return View::make('users.login');
    }

    $order_id = $request->id;

        $order = Order::with(['product' => function($query) {
                $query->with(['range', 'group'])->orderby('name');
                }])
        ->where('id', $order_id)
        //->orderby('product->name')
        ->first();



        if(!$order){
            return "Order does not exist";
        }


        if ($order->user_id !== Auth::user()->id && Auth::user()->level == 0){
            return "Order not avaialble to you";
        }


            //cost calculations

            $lineproduct = 0;
            $totalproduct = 0;
            $totaldirty = 0;
            $totalvat = 0;
            $totaltotal = 0;
            $orderCount = 0;


            foreach($order->product as $products){

                //calculate line product cost
                $lineproduct = ($products->price * $products->pivot->quantity);
                
                //add dirty charge if set
                if ($order->return == 'dirty' && $products->dirty == 1){
                    $linedirty = $lineproduct * 0.2;
                } else {
                    $linedirty = 0;
                }
                
                //add vat to line 
                $linevat = $products->vat * ($lineproduct + $linedirty);
                
                //line total
                $linetotal = $lineproduct + $linedirty + $linevat;


            // now sum up up the lines for each cost

                $totalproduct = $totalproduct + $lineproduct;
                $totaldirty = $totaldirty + $linedirty;
                $totalvat = $totalvat + $linevat;
                $totaltotal = $totaltotal + $linetotal;
                $orderCount = $orderCount + 1;

            }

            Session::put('orderCount', $orderCount);

            //return $productcost;
        
        Session::put('order', $order->id);
        //return $order;
        if ($order->status == 'Quote' || $order->status == 'Open'){
            return View::make('quote', compact('order', 'totalproduct', 'totaldirty', 'totalvat', 'totaltotal'));
        } else {
            return View::make('order', compact('order', 'totalproduct', 'totaldirty', 'totalvat', 'totaltotal'));
        }
        //return View::make('results');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


  



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */





    //add or edit products in quote
    public function edit()
    {   

            //check for integer in quantity
        if (!(Input::get('quantity') >= 0 && Input::get('quantity') < 1000)) {
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
        //save cookes for new user




        if (!Session::has('order')){
            //create new order
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->status = 'Open';
            $order->save();
            Session::put('order', $order->id);
            Session::put('orderCount', 0);
        }



        //return Session::has('order');

       $quantity = Input::get('quantity');
       $product_id = Input::get('product_id');
       $colour_id = Input::get('colour_hex');
       $action_id = Input::get('action_id');

        $order = Order::with('product')
        ->find(Session::get('order'));

        //if order bnot open then send to dash with message
        if ($order->status !== 'Quote' && $order->status !== 'Open'){
        Session::flash('message','This order is locked. Please click \'Start a new quote\' below to begin another order');
        Session::flash('alert-class', "alert-danger");
        return Redirect::to('users/dashboard');
        }
        //return $order;


    //return $product_id;
    $order->product()->detach($product_id);
    //attach if not 0 
    if(Input::get('quantity') != 0){
    $order->product()->attach($product_id, ['quantity' => $quantity, 'colour' => $colour_id]); 
    }

    //push productto order session
    //Session::put('order.product', $product_id);
    if($action_id == 'add'){
     //  return $action_id;
    }


   
    if($action_id == 'update'){
    return redirect()->route('orders.show', [$order->id]);
       return $action_id;
    } 


    //count them again
    $updatedOrder = Order::with('product')
    ->find(Session::get('order'));

        $orderCount = 0;
    foreach($updatedOrder->product as $products){
                $orderCount = $orderCount + 1;
            }

    //return $orderCount;

    Session::put('orderCount', $orderCount);     
    Session::flash('message', $quantity . " of these have been added to your quote");
    Session::flash('type', "success");



    return Redirect::back()->withCookie(cookie('user_id', Auth::user()->id, 3600));;
    
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



    public function updateDelivery()
    {       
    
    $postcode = Input::get('postcode');



    if($postcode != "Collected"){


   $postcode = str_replace(' ', '', $postcode); // remove any spaces;
   $postcode = strtoupper($postcode); // force to uppercase;
   $valid_postcode_exp = "/^(([A-PR-UW-Z]{1}[A-IK-Y]?)([0-9]?[A-HJKS-UW]?[ABEHMNPRVWXY]?|[0-9]?[0-9]?))\s?([0-9]{1}[ABD-HJLNP-UW-Z]{2})$/i";
   
   // set default output results (assuming invalid postcode):
   if (!preg_match($valid_postcode_exp, strtoupper($postcode))) {
    Session::flash('postcodeMessage', 'This looks like the wrong format for a UK postcode. Please try again or contact us for a delivery quote');
    Session::flash('type', "danger");
    return Redirect::back();
   }


        //return $postcode;
        $url = 'http://maps.googleapis.com/maps/api/distancematrix/json?origins=GL28AX&destinations=' . $postcode .'&mode=driving&language=en-EN&sensor=false';
        $JSON = file_get_contents($url);
        $data = json_decode($JSON);


        if($data->rows[0]->elements[0]->status == 'NOT_FOUND'){
        Session::flash('postcodeMessage', 'We can find that postcode. Please try again or contact us for a delivery quote');
        Session::flash('type', "danger");
        return Redirect::back();
        }


        $distance = $data->rows[0]->elements[0]->distance->value;
        
    } else {

    $distance = 0;
    }
        
        //$obj = json_decode($json);

        //return Input::get('postcode');
        $order = Order::find(Session::get('order'));
        $order->postcode = $postcode;
        $order->distance = $distance;
        $order->save();

        Session::flash('postcodeMessage', 'That looks like a good postcode. We have added the estimated delivery & collection to your quote');
        Session::flash('type', "success");
        return Redirect::back();

    }



    public function updateDates()

    {

        $start_date = Input::get('start_date');
        $start_date = str_replace('/', '-', $start_date);
        $start_date = date('Y-m-d', strtotime($start_date));

        $end_date = Input::get('end_date');
        $end_date = str_replace('/', '-', $end_date);
        $end_date = date('Y-m-d', strtotime($end_date));

        $order = Order::find(Session::get('order'));
        
        $order->start_date = $start_date;
        $order->end_date = $end_date;

        if($start_date >= $end_date){
        Session::flash('datesMessage','Your start date is after you end date');
        Session::flash('type', "danger");
        return Redirect::back()->withinput();
        }


        //check its not too long
        $diff = abs(strtotime($end_date) - strtotime($start_date));
        $days = $diff / 86400;
        if($days > 4){
        Session::flash('datesMessage','That\'s more than our normal hire period. You\'ll have to ontact us for a quote');
        Session::flash('type', "danger");
        return Redirect::back()->withinput();
        }

   

        $order->save();
        Session::flash('datesMessage','Your dates are sweet!');
        Session::flash('type', "success");
        return Redirect::back();

    }



public function updateAddress(Requests\AddressUpdateRequest $request)
    {
        $order = Order::find(Session::get('order'));
        $order->address1 = $request->address1;
        $order->town = $request->town;
        $order->county = $request->county;
        $order->postcode = $request->postcode;
        $order->instructions = $request->instructions;
        $order->status = 'Processing';

        $order->save();

        //send verification email
        Mail::send('emails.notify', ['order' => $order], function($message) {
         $message->from(Config::get('app.noreplyEmail'), Config::get('app.noreplyEmailName'));
         $message->to(Config::get('app.adminEmail'), Config::get('app.adminEmailName'))
         ->subject(Config::get('app.companyName') . ' - Order notification');
        });



        Session::flash('message','That\s saved and someone will contact you shortly');
        Session::flash('alert-class', "alert-success");
        return Redirect::to('users/dashboard');
    }




    public function updateReturn()
    {
        $order = Order::find(Session::get('order'));
        $order->return = Input::get('return');
        $order->save();
        //Session::flash('you return state has been updated');
        //Session::flash('type', "success");
        return Redirect::back();
    }


        public function getQuote()
    {
        $order = Order::find(Session::get('order'));
        $order->status = 'Quote';
        $order->save();

        //send verification email
        Mail::send('emails.notify', ['order' => $order], function($message) {
         $message->from(Config::get('app.noreplyEmail'), Config::get('app.noreplyEmailName'));
         $message->to(Config::get('app.adminEmail'), Config::get('app.adminEmailName'))
         ->subject(Config::get('app.companyName') . ' - Order notification');
        });



        Session::flash('message','That\s saved and someone will contact you shortly');
        Session::flash('alert-class', "alert-success");
        return Redirect::to('users/dashboard');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function newquote()
    {
        Session::forget('order');
        Session::forget('orderCount');
        return redirect('products/china/0/0');
        //return View::order('index');
    }


        public function destroy($id)
    {
        //
    }




}
