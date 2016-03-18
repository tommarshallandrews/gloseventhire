<?php

// receive suggested name
$username = Input::get('username');
//$username = 'Styk';

//if logged in 
if (Auth::check())
{
        if ($username == Auth::user()->username) {
        echo '1';
        //return $ownUsername;
        }
}

    //check if name exists

     $usernames = DB::table('users')
     ->where('username','=', $username)
     //->where('username','!=' $ownUsername )
    ->first();

    //return ajax response to form

    if(empty($usernames->id)) {
        echo '0';
    } else {
        echo '1';
    }

    //echo($ownUsername);

?>