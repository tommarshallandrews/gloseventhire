<?php

/**
 * Films model config
 */

return array(

    'title' => 'Orders',

    'single' => 'order',

    'model' => 'App\Order',

     'form_width' => 600,

    /**
     * The display columns
     */

    'columns' => array(
        
        'id' => array(
            'title' => 'Order ID',
            'type' => 'text',
        ),  


        'updated_at' => array(
            'title' => 'Order Updated',
            'type' => 'text',
        ),

        'start_date' => array(
            'title' => 'Event start date',
            'type' => 'text',
        ),

        'status' => array(
            'title' => 'Status',
            'type' => 'text',
        ),  

        'lastname' => array(
            'title' => 'Surname',
            'relationship' => 'user',
            'select' => 'lastname',
        ),

        'firstname' => array(
            'title' => 'First name',
            'relationship' => 'user',
            'select' => 'firstname',
        ),

        'email' => array(
            'title' => 'Email',
            'relationship' => 'user',
            'select' => 'email',
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


       'status' => array(
            'type' => 'enum',
            'title' => 'Status',
            'options' => array('open','quote','paid','complete','cancelled','refunded'), //must be an array
        ),

        

        'updated_at' => array(
            'title' => 'Order Updated',
            'type' => 'date',
            'date_format' => 'yy-mm-dd',
        ),


        'user' => array(
            'type' => 'relationship',
            'title' => 'Email (orderer)',
            'name_field' => 'email',
            'autocomplete' => true,
            'num_options' => 10, //default is 10
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
            'title' => 'Order ID',
            'type' => 'text',
        ),

         'status' => array(
            'title' => 'Status',
            'type' => 'enum',
            'options' => array('Open','Quote','Processing','Paid','Complete','Cancelled','Refunded'), //must be an array
        ),


        'address1' => array(
        'title' => 'Event Address 1',
        'type' => 'text',
        ),     

        'address2' => array(
        'title' => 'Event Address 2',
        'type' => 'text',
        ),    

        'town' => array(
        'title' => 'Event Town',
        'type' => 'text',
        ), 

        'county' => array(
        'title' => 'Event County',
        'type' => 'text',
        ), 

        'postcode' => array(
        'title' => 'Event Postcode',
        'type' => 'text',
        ), 






    'user' => array(
    'type' => 'relationship',
    'title' => 'User ID',
    'name_field' => 'id', //what column or accessor on the other table you want to use to represent this object
    'editable' => false,
),
 


        'created_at' => array(
            'title' => 'Billing Created',
            'editable' => false,
        ), 

        'updated_at' => array(
        'title' => 'Updated',
        'editable' => false,

        ), 




    ),


    /**
 * This is where you can define the model's custom actions
 */
'actions' => array(
    //Clearing the site cache
    'view_order' => array(
        'title' => 'Launch quote details',
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
            return redirect('listing/' . $data->id);
            //return Redirect::route('orders.show');

            //return true to flash the success message
            //return false to flash the default error
            //return a string to show a custom error
            //return a Response::download() to initiate a file download
            //return true;
        }
    ),



    'update_order' => array(
        'title' => 'Update order',
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
            return redirect('quote/' . $data->id);
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