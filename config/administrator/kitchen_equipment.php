<?php


/**
 * Films model config
 */
//dd(class_exists('China')); 

return array(

	'title' => 'Kitchen Equipment',

	'single' => 'Kitchen Equipment',

	'model' => 'App\Product',

	'form_width' => 700,

    'query_filter'=> function($query)
{
        $query->whereCat_id(50);
},

	/**
	 * The display columns
	 */
	'columns' => array(



		'code' => array(
			'title' => 'Code',
			'type' => 'text',
		),	

        'name' => array(
            'title' => 'Name',
            'type' => 'text',
        ),

         'group' => array(
            'relationship' => 'group',
            'title' => 'Group',
             'select' => "(:table).name",
        ), 

        'range' => array(
            'relationship' => 'range',
            'title' => 'Type',
            'select' => "(:table).name",
        ),

        'order' => array(
            'title' => 'Order',
            'type' => 'number',
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
        
        'group' => array(
            'type' => 'relationship',
            'title' => 'Group',
            'name_field' => 'group', //what column or accessor on the other table you want to use to represent this object
            'options_filter'=> function($query)
                {
                    $query->where('cat_id', '=', 50)->orderby('name');
                },
        ), 

        'range' => array(
            'type' => 'relationship',
            'title' => 'Range',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
            'options_filter'=> function($query)
                {
                    $query->where('cat_id', '=', 50)->orderby('name');
                },
        ), 
        
        'order' => array(
            'title' => 'Order',
            'type' => 'number',
        ),
		
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(


        'cat_id' => array(
            'title' => 'Type',
            'type' => 'text',
            'value' => '50', //must be an array
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


        'group' => array(
            'type' => 'relationship',
            'title' => 'Group',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
            'options_filter'=> function($query)
                {
                    $query->where('cat_id', '=', 50)->orderby('name');
                },
        ),  


        'range' => array(
            'type' => 'relationship',
            'title' => 'China Range',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
            'options_filter'=> function($query)
                {
                    $query->where('cat_id', '=', 50)->orderby('name');
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
            'type' => 'wysiwyg',
            'title' => 'Notes / FAQ',
            'limit' => 1000, //optional, defaults to no limit
            'height' => 80, //optional, defaults to 100
            'description' => 'Notes on usage etc',
        ),  	



		'image1' => array(
            'title' => 'Image 1',
            'type' => 'image',
            'location' => public_path() . '/images/',
            'naming' => 'keep',
            'length' => 20,
            'size_limit' => 20,
            'sizes' => array(
                   array(213, 160, 'fit', public_path() . '/thumbs/', 70)
                )

        ),

        'image2' => array(
            'title' => 'Image 2',
            'type' => 'image',
            'location' => public_path() . '/images/',
            'naming' => 'keep',
            'length' => 20,
            'size_limit' => 20,
            'sizes' => array(
                   array(213, 160, 'fit', public_path() . '/thumbs/', 70)
                )
        ),

        'image3' => array(
            'title' => 'Image 3',
            'type' => 'image',
            'location' => public_path() . '/images/',
            'naming' => 'keep',
            'length' => 20,
            'size_limit' => 20,
            'sizes' => array(
                   array(213, 160, 'fit', public_path() . '/thumbs/', 70)
                )
        ),

        'image4' => array(
            'title' => 'Image 4',
            'type' => 'image',
            'location' => public_path() . '/images/',
            'naming' => 'keep',
            'length' => 20,
            'size_limit' => 20,
            'sizes' => array(
                   array(213, 160, 'fit', public_path() . '/thumbs/', 70)
                )
        ),


        'document1' => array(
                'title' => 'File upload',
                'type' => 'file',
                'location' => public_path() . '/documents/',
                'naming' => 'keep',
                'length' => 20,
                'size_limit' => 20,
                'mimes' => 'pdf,psd,doc,docx',
            ),

        'order' => array(
            'title' => 'Order',
            'type' => 'number',
            'value' => '0',
        ),

        'dirty' => array(
            'type' => 'bool',
            'title' => 'Dirty charge appliable',
        ),

        'vat' => array(
            'type' => 'number',
            'title' => 'VAT rate as fraction (20% = 0.200)',
            'symbol' => '', //optional, defaults to ''
            'decimals' => 3, //optional, defaults to 0h
            'thousands_separator' => ',', //optional, defaults to ','
            'decimal_separator' => '.', //optional, defaults to '.'
            'value' => '0.200',
        ),

	),

);