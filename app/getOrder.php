<?php

namespace App;

use Session;

use App\Contracts\Helpers\RocketShipContract;

class getOrder {



    public function orderCount() 
    {   
        if (session::has('orderCount')){
                $orderCount = session::get('orderCount');
        } else {
                $orderCount = 0;
        }
         return $orderCount;
    }



    public function order() 
    {   
        if (session::has('order')){
                $order = session::get('order');
        } else {
                $order = 0;
        }
         return $order;
    }



}
