<?php


/**
 * Films model config
 */
//dd(class_exists('China')); 

return array(

	'title' => 'China',

	'single' => 'China',

	'model' => 'App\Product',

	'form_width' => 400,

    'query_filter'=> function($query)
{
        $query->whereCat_id(10);
},

	/**
	 * The display columns
	 */
	'columns' => array(

        'image1' => array(
        'title' => 'Image',
        'output' => '<img src=' . public_path() . '/images/(:value) height="30px"/>',
        ),



		'code' => array(
			'title' => 'Code',
			'type' => 'text',
		),	

        'name' => array(
            'title' => 'Name',
            'type' => 'text',
        ),  

         'type' => array(
            'relationship' => 'type',
            'title' => 'Type',
             'select' => "(:table).name",
        ), 

        'range' => array(
            'relationship' => 'range',
            'title' => 'Type',
            'select' => "(:table).name",
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

        'name' => array(
            'title' => 'Name',
            'type' => 'text',
        ),  

        'type' => array(
            'type' => 'relationship',
            'title' => 'Type',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
            'options_filter'=> function($query)
                {
                    $query->where('cat_id', '=', 10)->orderby('name');
                },
        ), 

        'range' => array(
            'type' => 'relationship',
            'title' => 'China Range',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
            'options_filter'=> function($query)
                {
                    $query->where('cat_id', '=', 10)->orderby('name');
                },
        ), 


		
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(


        'cat_id' => array(
            'title' => 'Type',
            'type' => 'text',
            'value' => '10', //must be an array
            'visible' => false,
        ),


		'code' => array(
			'title' => 'Code',
			'type' => 'text',
		),	
        
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


        'type' => array(
            'type' => 'relationship',
            'title' => 'Type',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
            'options_filter'=> function($query)
                {
                    $query->where('cat_id', '=', 10)->orderby('name');
                },
        ),  


        'range' => array(
            'type' => 'relationship',
            'title' => 'Range',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
            'options_filter'=> function($query)
                {
                    $query->where('cat_id', '=', 10)->orderby('name');
                },
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
            'type' => 'textarea',
            'limit' => 1000, //optional, defaults to no limit
            'height' => 80, //optional, defaults to 100
            'description' => 'Pack size description',
        ),


		'image1' => array(
    		'title' => 'Image 1',
    		'type' => 'image',
    		'location' => public_path() . '/images/',
    		'naming' => 'keep',
    		'length' => 20,
    		'size_limit' => 20,
		),

		'image2' => array(
    		'title' => 'Image 2',
    		'type' => 'image',
    		'location' => public_path() . '/images/',
    		'naming' => 'keep',
    		'length' => 20,
    		'size_limit' => 20,
		),

		'image3' => array(
    		'title' => 'Image 3',
    		'type' => 'image',
    		'location' => public_path() . '/images/',
    		'naming' => 'keep',
    		'length' => 20,
    		'size_limit' => 20,
		),

        'image4' => array(
            'title' => 'Image 4',
            'type' => 'image',
            'location' => public_path() . '/images/',
            'naming' => 'keep',
            'length' => 20,
            'size_limit' => 20,
        ),




	),

);