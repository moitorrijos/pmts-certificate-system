<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_5614283e5ca55',
	'title' => 'Instructors',
	'fields' => array (
		array (
			'key' => 'field_5614284381a80',
			'label' => 'Nationality',
			'name' => 'nationality',
			'type' => 'text',
			'instructions' => 'Instructor\'s nationality',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => 'instructors-nationality',
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
		array (
			'key' => 'field_5614287481a81',
			'label' => 'Country of Residence',
			'name' => 'instructor_residence',
			'type' => 'text',
			'instructions' => 'Country of residence and training',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => 'instructor-residence',
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
		array (
			'key' => 'field_56142936be32d',
			'label' => 'Authorized Courses',
			'name' => 'authorized_courses',
			'type' => 'post_object',
			'instructions' => 'Courses that this instructor is authorized to give.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => 'authorized-courses',
				'id' => '',
			),
			'post_type' => array (
				0 => 'courses',
			),
			'taxonomy' => array (
			),
			'allow_null' => 0,
			'multiple' => 1,
			'return_format' => 'object',
			'ui' => 1,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'instructors',
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
	),
	'active' => 1,
	'description' => '',
));

endif;