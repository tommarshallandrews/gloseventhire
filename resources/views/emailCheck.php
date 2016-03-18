<?php



// receive suggested name
$email = Input::get('email');

    //check if name exists
    //$emailactive = User::where('email','=', $email)
    //->first();
if (Auth::check())
    {
        if ($email == Auth::user()->email) {
        echo '1';
        //return $ownUsername;
        }
    }
    
    $emailactive = DB::table('users')
    ->where('email','=', $email)
    ->first();



    //return ajax response to form



    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '0';
    } 
    elseif (!empty($emailactive->id)) {
    	echo '2';
    }else{
    	echo '1';
    }

?>