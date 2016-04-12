<?php

namespace App;

use Session;


class getMeta {



    public function keywords() 
    {   
        if (session::has('keywords')){
                $keywords = session::get('keywords');
        } else {
                $keywords = '';
        }
         return $keywords;
    }



    public function title() 
    {   
        if (session::has('title')){
                $title = ' - ' . session::get('title');
        } else {
                $title = '';
        }
         return $title;
    }




}
