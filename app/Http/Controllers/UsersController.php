<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Order;
use App\Enquiry;
use View;
use Hash;
use Mail;
use Auth;
use Redirect;
use Session;
use Config;

class UsersController extends Controller {

    protected $layout = "masters.default";

    public function __construct() {
        $this->beforeFilter('csrf', array('on'=>'post'));
        $this->beforeFilter('auth', array('only'=>array('getDashboard')));
    }





  public function getLogin() {
        Auth::logout();
        Session::flash('keywords', '');
        Session::flash('title', 'Login');
        return View::make('users.login');
    }

    




    public function getRegister() {
        Session::flash('keywords', '');
        Session::flash('title', 'Register');
        return View::make('users.register');
    }


  

            
    //create a new user fomr scratch



    public function postStore(Requests\UserAddRequest $request) {
    

        if (!Auth::check()) {
        //create unregistered user and a new make for them
        $user = new User;
        $user->save();
        Auth::login($user);
        //return $user;
        } 


        $user = Auth::User();

        $confirmation_code = str_random(30);

        $user->email = $request->email;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->confirmation_code = $confirmation_code;
        $user->confirmed = '1';
        $user->save();

        //send verification email
       // Mail::send('emails.verify', ['confirmation_code' => $confirmation_code], function($message) use ($user) {
         //$message->from(Config::get('app.noreplyEmail'), Config::get('app.noreplyEmailName'));
         //$message->to($user->email)
         //->subject('Gloucester Event Hire - Email verification');
        //});


        //Session::flash('registerMessage','Thanks for registering. we\'ve sent you an email with a validation link. Please check and validate you email address. If you don\'t see it pleaes check you spam folder or click ACCOUNT above to resend it' );
        //Session::flash('type', "success");
        return Redirect::to('users/dashboard');


        
    }





    public function postUpdate(Requests\UserUpdateRequest $request) {
    


        $user = Auth::User();

        $user->email = $request->email;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->save();


        if($request->submitType == 'contact'){
            return "contact dash";
        }

        if($request->submitType == 'order'){
            return "order address page";
        }

        return Redirect::to('users/dashboard')
                ->with('message', 'That is updated for you now')
                ->with('alert-class', 'alert-success')
                ->withInput();

        
    }

    public function getAddressbilling() {
        $user = Auth::user();
        Session::flash('keywords', '');
        Session::flash('title', 'Billing Address');
        return View::make('users.addressbilling', compact('user'));
    }


    public function postAddressbilling(Requests\AddressUpdateRequest $request)
    {


        $user = Auth::user();
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->town = $request->town;
        $user->county = $request->county;
        $user->postcode = $request->postcode;
        $user->save();
        
        //if ordering direct to delivery address page
        if($request->action == 'order'){
        return Redirect::to('address/' . session::get('order'));
        }

        return Redirect::to('users/dashboard')
        ->with('message', 'That is updated for you now')
        ->with('alert-class', 'alert-success')
        ->withInput();

    }





    public function postUpdatepassword(Requests\PasswordUpdateRequest $request) {

            $credentials = [
            'email' => Auth::user()->email,
            'password' => $request->get('old_password'),
            ];


            if(\Auth::validate($credentials)) {
                    $user = Auth::User();
                    $user->password = Hash::make($request->password);
                    $user->save();
            

            return Redirect::to('users/dashboard')
                ->with('password-message', 'That updated for you.')
                ->with('alert-class', 'alert-success')
                ->withInput();

            }   



            return Redirect::to('users/dashboard')
                ->with('password-message', 'That not your password')
                ->with('alert-class', 'alert-danger')
                ->withInput();
    

    }





        //acount form user who has previously regisered
        public function getEdit() {
        $user = User::find(Auth::user()->id);
        //return $user;
    Session::forget('keywords');
    Session::forget('title');
        return View::make('users.edit', compact('user'));
        //return "edit";
    }






    public function postSignin(Requests\UserLoginRequest $request) {

        $order = '0';




        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {


                //chech emailconfirmation and resirect to redent is necessary
                if(!Auth::user()->confirmed == 1 ){
                    return View::make('users.resend');
                }

            //check for an orphan order
            if(Session::has('order')) {
                $order = Order::find(Session::get('order'));
                $order->user_id = Auth::user()->id;
                $order->save();
                
            }



                return Redirect::to('users/dashboard')
                ->with('message', 'Welcome back '. Auth::user()->username .' - You are now logged back in')
                ->with('alert-class', 'alert-success')
                ->withInput();

            

        } else {

            return Redirect::to('users/login')
                ->with('message', 'Your username/password combination was incorrect')
                ->with('alert-class', 'alert-danger')
                ->withInput();
        }
    }





    public function getDashboard() {

        if(!Auth::check()){
            return View::make('users.login');
        }
        
        $orders = Order::
        where('user_id', Auth::user()->id)
        ->orderby('id', 'desc')
        ->get();

        $user = Auth::user();

        Session::flash('keywords', '');
        Session::flash('title', 'Dashboard');


        return View::make('users.dashboard', compact('orders','user'));

    }


   



    public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {   
            Session::flash('alert-class', 'alert-warning'); 
            return Redirect::to('users/dashboard')
            ->with('message', 'That confirmtion link is bad. Click on accounts to send another one')
            ->with('alert-class', 'alert-danger')
            ->withInput();
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {   
            Session::flash('alert-class', 'alert-warning');
            return Redirect::to('users/dashboard')
            ->with('message', 'That confirmtion link is bad. Click on accounts to send another one')
            ->with('alert-class', 'alert-danger')
            
            ->withInput();
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        Auth::login($user);

        $currentorder = Order::where('user_id', $user->id)
        ->where('status', 'open')
        ->first();

        if($currentorder)
            {
            session::put('order', $currentorder->id);
            }


        return View::make('thanks');

        //if there is a live order then redirect to that quote page
        if(session::has('order')){
        return Redirect::to('quote/' . session::get('order') .'')
            ->with('registerMessage', 'You are now verified and logged in.')
            ->with('type', 'success');
        }


        //otherwise go to the dashboard
        return Redirect::to('users/dashboard')
                ->with('message', 'You are now verified and logged in.')
                ->with('alert-class', 'alert-success')
                ->withInput();
}



public function getResend() {
    Session::forget('keywords');
    Session::forget('title');
        return View::make('users.resend');
    
    }



public function postResend(Request $request) {
        //$validator = Validator::make($data = Input::all(), User::$newUpdateRules);

        //genedate confirmation code
        $confirmation_code = str_random(30);

        if($request->email) {
        $user = User::where('email', '=', $request->email)->firstOrFail();
        } else {
        $user = Auth::user();
        }

        //return $user;
        

        $user->confirmation_code = $confirmation_code;


        //return $confirmation_code;
        $user->save();

        //send verification email
        Mail::send('emails.verify', ['confirmation_code' => $confirmation_code], function($message) use ($user) {
         $message->from(Config::get('app.noreplyEmail'), Config::get('app.noreplyEmailName'));
         $message->to($user->email)
         ->subject('Gloucester Event Hire - Email verification resend');
        });



        return Redirect::to('users/dashboard')
                ->with('message', 'We have sent a verification to that email address to check its all correct. Please check your inbox.')
                ->with('messageType','validate')
                ->with('alert-class', 'alert-success')
                ->withInput();
            //->withInput($input);
        //return Redirect::action('WorkshopController@show', Session::get('make_id', '0'));


}



 public function postEnquiry(Requests\EnquiryAddRequest $request) {
    


        $enquiry = New Enquiry;

        $enquiry->email = $request->email;
        $enquiry->name = $request->name;
        $enquiry->enquiry = $request->enquiry;
        $enquiry->save();

        $email = $enquiry->email;

        

        Mail::send('emails.messageThanks', ['name' => $enquiry->name], function($message)  use ($email){
         $message->from(Config::get('app.noreplyEmail'), Config::get('app.noreplyEmailName'));
         $message->to($email)
         ->subject(Config::get('app.companyName') . ' - Message received');
        });


         Mail::send('emails.messageNotification', ['name' => $enquiry->name, 'email' => $enquiry->email, 'enquiry' => $enquiry->enquiry, 'id' => $enquiry->id], function($message) {
         $message->from(Config::get('app.noreplyEmail'), Config::get('app.noreplyEmailName'));
         $message->to(Config::get('app.adminEmail'), Config::get('app.adminName'))
         ->subject(Config::get('app.companyName') . ' - Message notification');
        });




        return Redirect::to('contact-us')
                ->with('message', 'Thanks. Your message has been sent. You\'ll be hearing form us shortly')
                ->with('type', 'success')
                ->withInput();

        
    }


        



    public function getLogout() {
        Auth::logout();
        Session::forget('order');
        Session::forget('orderCount');
    Session::forget('keywords');
    Session::forget('title');
        return Redirect::to('users/login')->with('message', 'Your are now logged out!');
    }
}

