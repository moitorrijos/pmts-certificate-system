<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_58839952f2eb1',
	'title' => 'Application Form',
	'fields' => array (
		array (
			'key' => 'field_58839d6ee115e',
			'label' => '<i class="fa fa-id-card-o" aria-hidden="true"></i> Passport No or ID',
			'name' => 'passport_id_app',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
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
		array (
			'key' => 'field_58839d5ae115d',
			'label' => 'Participant\'s Name',
			'name' => 'participants_name_app',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
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
		array (
			'key' => 'field_58839d88e115f',
			'label' => 'Place of Birth',
			'name' => 'place_of_birth_app',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => 'place_of_birth_app',
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
			'key' => 'field_58839da3e1160',
			'label' => 'Nationality',
			'name' => 'nationality_app',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => 'nationality_app',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		// array (
		// 	'key' => 'field_588b765a60c36',
		// 	'label' => 'Rank',
		// 	'name' => 'rank_app',
		// 	'type' => 'text',
		// 	'instructions' => '',
		// 	'required' => 0,
		// 	'conditional_logic' => 0,
		// 	'wrapper' => array (
		// 		'width' => 25,
		// 		'class' => '',
		// 		'id' => '',
		// 	),
		// 	'default_value' => '',
		// 	'placeholder' => '',
		// 	'prepend' => '',
		// 	'append' => '',
		// 	'maxlength' => '',
		// 	'readonly' => 0,
		// 	'disabled' => 0,
		// ),
		array (
			'key' => 'field_58839db4e1161',
			'label' => 'Date of Birth',
			'name' => 'date_of_birth_app',
			'type' => 'date_picker',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => '',
			'wrapper' => array (
				'width' => 34,
				'class' => '',
				'id' => '',
			),
			'display_format' => 'j F Y',
			'return_format' => 'Ymd',
			'first_day' => 1,
		),
		array (
			'key' => 'field_58839e07e1162',
			'label' => 'Place of Training',
			'name' => 'place_of_training_app',
			'type' => 'select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => '',
			'wrapper' => array (
				'width' => 33,
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'01' => 'Panama',
				'02' => 'Durban, South Africa',
				'03' => 'PMTS Greece (Motsenigos)',
				'04' => 'Piraeus, Greece (Hellas)',
				'05' => 'Guyana',
				'06' => 'South Africa',
				'07' => 'India',
				'OB' => 'On Board',
			),
			'default_value' => array (
				0 => '01',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
		array (
			'key' => 'field_58839e9ae1163',
			'label' => 'Course Delivery Mode',
			'name' => 'course_delivery_mode_app',
			'type' => 'select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => '',
			'wrapper' => array (
				'width' => 33,
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'In Classroom' => 'In Classroom',
				'On Board' => 'On Board',
			),
			'default_value' => array (
				0 => 'In Classroom',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
		array (
			'key' => 'field_58839ecde1164',
			'label' => 'Courses to Take',
			'name' => 'courses_app',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => '',
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => '',
			'max' => '',
			'layout' => 'table',
			'button_label' => 'Add Course',
			'sub_fields' => array (
				array (
					'key' => 'field_58839f02e1165',
					'label' => 'Course Name',
					'name' => 'course_name_app',
					'type' => 'post_object',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 50,
						'class' => '',
						'id' => '',
					),
					'post_type' => array (
						0 => 'courses',
					),
					'taxonomy' => array (
					),
					'allow_null' => 0,
					'multiple' => 0,
					'return_format' => 'object',
					'ui' => 1,
				),
				array (
					'key' => 'field_58839f2ee1166',
					'label' => 'Instructor',
					'name' => 'instructor_name_app',
					'type' => 'post_object',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 18,
						'class' => '',
						'id' => '',
					),
					'post_type' => array (
						0 => 'instructors',
					),
					'taxonomy' => array (
					),
					'allow_null' => 0,
					'multiple' => 0,
					'return_format' => 'object',
					'ui' => 1,
				),
				array (
					'key' => 'field_58839f52e1167',
					'label' => 'Start Date',
					'name' => 'start_date_app',
					'type' => 'date_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 10,
						'class' => '',
						'id' => '',
					),
					'display_format' => 'j/m/y',
					'return_format' => 'Ymd',
					'first_day' => 1,
				),
				array (
					'key' => 'field_58839fa8e1169',
					'label' => 'End Date',
					'name' => 'end_date_app',
					'type' => 'date_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 10,
						'class' => '',
						'id' => '',
					),
					'display_format' => 'j/m/y',
					'return_format' => 'Ymd',
					'first_day' => 1,
				),
				array (
					'key' => 'field_58892d735a1b5',
					'label' => 'Night',
					'name' => 'night_app',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 2,
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'applications',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;