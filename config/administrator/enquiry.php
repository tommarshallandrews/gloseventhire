<?php

/**
 * Films model config
 */

return array(

    'title' => 'Enquiries',

    'single' => 'enquiry',

    'model' => 'App\Enquiry',

     'form_width' => 600,

    /**
     * The display columns
     */

    'columns' => array(
        


        'updated_at' => array(
            'title' => 'Enquiry date',
            'type' => 'text',
        ),


        'email' => array(
            'title' => 'Email',
            'type' => 'text',
        ),

        'name' => array(
            'title' => 'Name',
            'type' => 'text',
        ),



        
    ),



    /**
     * The filter set
     */
    'filters' => array(



        'email' => array(
            'title' => 'Email',
            'type' => 'text',
        ),

        'name' => array(
            'title' => 'Name',
            'type' => 'text',
        ),


    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(



        'email' => array(
            'title' => 'Email',
            'editable' => false,
        ),

        'name' => array(
            'title' => 'Name',
            'editable' => false,
        ),


        'enquiry' => array(
            'title' => 'Message',
            'editable' => false,
        ),

        'created_at' => array(
            'title' => 'Created',
            'editable' => false,
        ), 






    ),


    /**
 * This is where you can define the model's custom actions
 */

        


);