<?php


/**
 * Films model config
 */
//dd(class_exists('China')); 

return array(

	'title' => 'China',

	'single' => 'China',

	'model' => 'App\China',

	'form_width' => 400,

	/**
	 * The display columns
	 */
	'columns' => array(



		'code' => array(
			'title' => 'Code',
			'type' => 'text',
		),	

        'Chinatypes' => array(
            'title' => 'Type',
            'relationship' => 'Chinatypes',
            'select' => 'name',
        ),
            
        'Chinamakes' => array(
            'title' => 'Range',
            'relationship' => 'Chinamakes',
            'select' => 'name',
        ),


	),

	/**
	 * The filter set
	 */
	'filters' => array(


		'code' => array(
			'title' => 'Code',
			'type' => 'text',
		),	
		
        'Chinatypes' => array(
            'title' => 'Type',
            'type' => 'relationship',
            'name_field' => 'name',
        ),


        'Chinamakes' => array(
            'title' => 'Range',
            'type' => 'relationship',
            'name_field' => 'name',
        ),


	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(

		'code' => array(
			'title' => 'Code',
			'type' => 'text',
		),	




		'price' => array(
    		'type' => 'number',
    		'title' => 'Price each (pence)',
    		'symbol' => '', //optional, defaults to ''
    		'decimals' => 0, //optional, defaults to 0h
    		'thousands_separator' => ',', //optional, defaults to ','
    		'decimal_separator' => '.', //optional, defaults to '.'
		),	


         'description' => array(
            'type' => 'textarea',
            'title' => 'Description',
            'limit' => 1000, //optional, defaults to no limit
            'height' => 80, //optional, defaults to 100
            'description' => 'Product description',
        ),  


         'notes' => array(
            'type' => 'textarea',
            'title' => 'Notes / FAQ',
            'limit' => 1000, //optional, defaults to no limit
            'height' => 80, //optional, defaults to 100
            'description' => 'Notes on usage etc',
        ),  	

        'notes' => array(
            'type' => 'textarea',
            'title' => 'Notes / FAQ',
            'limit' => 1000, //optional, defaults to no limit
            'height' => 80, //optional, defaults to 100
            'description' => 'Notes on usage etc',
        ), 

        'pack' => array(
            'title' => 'Pack Quantity',
            'type' => 'enum',
            'options' => array('10','24','40'), //must be an array
        ),


		'image1' => array(
    		'title' => 'Image',
    		'type' => 'image',
    		'location' => public_path() . '/images/',
    		'naming' => 'keep',
    		'length' => 20,
    		'size_limit' => 20,
		),

		'image2' => array(
    		'title' => 'Image',
    		'type' => 'image',
    		'location' => public_path() . '/images/',
    		'naming' => 'keep',
    		'length' => 20,
    		'size_limit' => 20,
		),

		'image3' => array(
    		'title' => 'Image',
    		'type' => 'image',
    		'location' => public_path() . '/images/',
    		'naming' => 'keep',
    		'length' => 20,
    		'size_limit' => 20,
		),


		'Chinatypes' => array(
    		'type' => 'relationship',
    		'title' => 'Type',
    		'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
    	),	

         'Chinamakes' => array(
            'title' => 'Type',
            'type' => 'relationship',
            'name_field' => 'name',
        ),








	),

);