<?php


/**
 * Films model config
 */
//dd(class_exists('China')); 

return array(

	'title' => 'Cutlery',

	'single' => 'Cutlery',

	'model' => 'App\Product',

	'form_width' => 400,

    'query_filter'=> function($query)
{
        $query->whereType('Cutlery');
},

	/**
	 * The display columns
	 */
	'columns' => array(



		'code' => array(
			'title' => 'Code',
			'type' => 'text',
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


        'type' => array(
            'title' => 'Type',
            'type' => 'enum',
            'options' => array('China','Cutlery','40'), //must be an array
        ),


		
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(


        'type' => array(
            'title' => 'Type',
            'type' => 'enum',
            'options' => array('China','Cutlery','40'), //must be an array
        ),


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


        'range' => array(
            'type' => 'relationship',
            'title' => 'China Range',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
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






	),

);