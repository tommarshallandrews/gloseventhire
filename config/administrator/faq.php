<?php


/**
 * Films model config
 */
//dd(class_exists('China')); 

return array(

	'title' => 'FAQs',

	'single' => 'FAQ',

	'model' => 'App\Faq',

	'form_width' => 700,


	/**
	 * The display columns
	 */
	'columns' => array(


        'heading' => array(
            'type' => 'text',
            'title' => 'Heading',
        ),


     ),


	/**
	 * The filter set
	 */
	'filters' => array(

        'heading' => array(
            'type' => 'text',
            'title' => 'Heading',
        ),

		
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(





        'heading' => array(
            'type' => 'text',
            'title' => 'Heading',
        ),



        'body' => array(
            'type' => 'wysiwyg',
            'title' => 'Body',
        ),

        'order' => array(
            'type' => 'number',
            'title' => 'Order',
        ),


	),

);