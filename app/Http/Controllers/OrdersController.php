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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    


    public function show(request $request)
    {   

    if(!Auth::check()){
    return View::make('users.login');
    }

    $order_id = $request->id;

        $order = Order::with(['product' => function($query) {
                $query->with(['range', 'group'])->orderby('name');
                }])
        ->where('user_id', '=',  Auth::user()->id, 'and')
        ->where('id', $order_id)
        //->orderby('product->name')
        ->first();


        if(!$order){
            return redirect('products/china/0/0');
        }

            //cost calculations

            $lineproduct = 0;
            $totalproduct = 0;
            $totaldirty = 0;
            $totalvat = 0;
            $totaltotal = 0;


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

            }

            //return $productcost;
        
        Session::put('order', $order->id);
        //return $order;
        return View::make('quote', compact('order', 'totalproduct', 'totaldirty', 'totalvat', 'totaltotal'));
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
        //save cookes for new user




        if (!Session::has('order')){
            //create new order
            $order = new Order;
            $order->user_id = Auth::user()->id;
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

    //return $order;

    Session::put('orderCount', count($order->product) + 1);

    //return $product_id;
    $order->product()->detach($product_id);
    $order->product()->attach($product_id, ['quantity' => $quantity, 'colour' => $colour_id]); 

    //push productto order session
    //Session::put('order.product', $product_id);
    if($action_id == 'add'){
     //  return $action_id;
    }


   
    if($action_id == 'update'){
    return redirect()->route('orders.show', [$order->id]);
       return $action_id;
    } 




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

        Session::flash('postcodeMessage', 'Sweet. that looks like a good postcode. We have added the estimated delivery & collection to your quote');
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
        if($days > 7){
        Session::flash('datesMessage','That\'s more than a week dude! call us');
        Session::flash('type', "danger");
        return Redirect::back()->withinput();
        }
        
        
        $order->save();
        Session::flash('datesMessage','Your dates are sweet!');
        Session::flash('type', "success");
        return Redirect::back();

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
