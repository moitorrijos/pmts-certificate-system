<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_561426b22a705',
	'title' => 'Resolutions',
	'fields' => array (
		array (
			'key' => 'field_561426b7e20b8',
			'label' => 'Date',
			'name' => 'date',
			'type' => 'date_picker',
			'instructions' => 'Date of resulition',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 40,
				'class' => '',
				'id' => '',
			),
			'display_format' => 'd/m/Y',
			'return_format' => 'd/m/Y',
			'first_day' => 1,
		),
		array (
			'key' => 'field_561426d6e20b9',
			'label' => 'Country',
			'name' => 'country',
			'type' => 'text',
			'instructions' => 'Country of resolution',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 60,
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'resolutions',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'permalink',
		1 => 'the_content',
		2 => 'excerpt',
		3 => 'custom_fields',
		4 => 'discussion',
		5 => 'comments',
		6 => 'revisions',
		7 => 'slug',
		8 => 'author',
		9 => 'format',
		10 => 'page_attributes',
		11 => 'featured_image',
		12 => 'categories',
		13 => 'tags',
		14 => 'send-trackbacks',
	),
	'active' => 1,
	'description' => '',
));

endif;