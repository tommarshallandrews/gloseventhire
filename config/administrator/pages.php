<?php


/**
 * Films model config
 */
//dd(class_exists('China')); 

return array(

	'title' => 'Page content',

	'single' => 'Page',

	'model' => 'App\Page',

	'form_width' => 400,


	/**
	 * The display columns
	 */
	'columns' => array(

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

        'navigation' => array(
            'type' => 'text',
            'title' => 'Color',
        )

        'heading' => array(
            'type' => 'text',
            'title' => 'Heading',
        )

        'slug' => array(
            'type' => 'text',
            'title' => 'Slug',
        )

        'body' => array(
            'type' => 'wysiwyg',
            'title' => 'Body',
        )


	),

);