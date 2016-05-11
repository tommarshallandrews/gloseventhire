<?php

/**
 * Films model config
 */

return array(

    'title' => 'Users',

    'single' => 'user',

    'model' => 'App\User',

     'form_width' => 600,

    /**
     * The display columns
     */

    'columns' => array(
        
        'id' => array(
            'title' => 'Order ID',
            'type' => 'text',
        ),  

        'lastname' => array(
            'title' => 'Surname',
            'type' => 'text',
        ),

        'firstname' => array(
            'title' => 'First name',
            'type' => 'text',
        ),

        'email' => array(
            'title' => 'Email',
            'type' => 'text',
        ),

        'postcode' => array(
            'title' => 'Postcode',
            'type' => 'text',
        ),


        
    ),



    /**
     * The filter set
     */
    'filters' => array(
        'id',


        'updated_at' => array(
            'title' => 'Order Updated',
            'type' => 'date',
            'date_format' => 'yy-mm-dd',
        ),


        'lastname' => array(
            'type' => 'text',
            'title' => 'Surname',
        ),


        'postcode' => array(
            'type' => 'text',
            'title' => 'Delivery Postcode',
        ),


    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(

        'id' => array(
            'title' => 'User ID',
            'type' => 'text',
        ),

        'firstname' => array(
        'title' => 'First name',
        'type' => 'text',
        ),  

        'lastname' => array(
        'title' => 'Last name',
        'type' => 'text',
        ),  

        'address1' => array(
        'title' => 'Address 1',
        'type' => 'text',
        ),     

        'address2' => array(
        'title' => 'Address 2',
        'type' => 'text',
        ),    

        'town' => array(
        'title' => 'Town',
        'type' => 'text',
        ), 

        'county' => array(
        'title' => 'County',
        'type' => 'text',
        ), 

        'postcode' => array(
        'title' => 'Postcode',
        'type' => 'text',
        ), 

        'phone' => array(
        'title' => 'Phone',
        'type' => 'text',
        ), 


        'created_at' => array(
            'title' => 'Created',
            'editable' => false,
        ), 

        'updated_at' => array(
        'title' => 'Updated',
        'editable' => false,

        ), 




    ),

'actions' => array(
    //Clearing the site cache
    'clear_cache' => array(
        'title' => 'View quotes page',
        'messages' => array(
            'active' => 'Launching window...',
            'success' => 'Cache cleared!',
            'error' => 'There was an error while clearing the cache',
        ),
        //the settings data is passed to the function and saved if a truthy response is returned
        'action' => function(&$data)
        {
            //Cache::flush();
            //return $data;
            //Route::get('/quote/{id}', [ 'as' => 'orders.show', 'uses' => 'OrdersController@show' ]);
            return redirect('dashboard/' . $data->id);
            //return Redirect::route('orders.show');

            //return true to flash the success message
            //return false to flash the default error
            //return a string to show a custom error
            //return a Response::download() to initiate a file download
            //return true;
        }
    ),
),
  


);