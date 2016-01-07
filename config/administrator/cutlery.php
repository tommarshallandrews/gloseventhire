<?php


/**
 * Films model config
 */
//dd(class_exists('Cutlery')); 

return array(

	'title' => 'Cutlery',

	'single' => 'Cutlery',

	'model' => 'App\Cutlery',

	'form_width' => 400,

	/**
	 * The display columns
	 */
	'columns' => array(



		'name' => array(
			'title' => 'Name',
			'type' => 'text',
		),	

        'cutlerytypes' => array(
            'title' => 'Type',
            'relationship' => 'cutlerytypes',
            'select' => 'name',
        ),
            
        'cutlerymakes' => array(
            'title' => 'Range',
            'relationship' => 'cutlerymakes',
            'select' => 'name',
        ),


	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',

		'name' => array(
			'title' => 'Name',
			'type' => 'text',
		),	
		
        'cutlerytypes' => array(
            'title' => 'Type',
            'type' => 'relationship',
            'name_field' => 'name',
        ),


        'cutlerymakes' => array(
            'title' => 'Range',
            'type' => 'relationship',
            'name_field' => 'name',
        ),


	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(

		'name' => array(
			'title' => 'Name',
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


		'cutlerytypes' => array(
    		'type' => 'relationship',
    		'title' => 'Type',
    		'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
    	),	

         'cutlerymakes' => array(
            'title' => 'Type',
            'type' => 'relationship',
            'name_field' => 'name',
        ),








	),

);