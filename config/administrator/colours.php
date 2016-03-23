<?php


/**
 * Films model config
 */
//dd(class_exists('China')); 

return array(

	'title' => 'linen Colours',

	'single' => 'Colour',

	'model' => 'App\Colour',

	'form_width' => 400,


	/**
	 * The display columns
	 */
	'columns' => array(





    'hex' => array(
    'title' => 'Color',
    'output' => function($value)
    {
        return '<div style="background-color: ' . $value . '; width: 200px; height: 20px; border-radius: 2px;"></div>';
    },
),

     'name' => array(
            'title' => 'Name',
            'type' => 'text',
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




        'name' => array(
            'title' => 'Name',
            'type' => 'text',
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

        'order' => array(
            'title' => 'Order',
            'type' => 'number',
        ),

        'hex' => array(
        'type' => 'color',
        'title' => 'Color',
        )


	),

);