<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_56e049e34d4be',
	'title' => 'Quotations',
	'fields' => array (
		array (
			'key' => 'field_56e049f20dfda',
			'label' => 'Participant\'s Name',
			'name' => 'participants_name',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
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
			'key' => 'field_5722297b2324f',
			'label' => 'Participant\'s Nationality',
			'name' => 'participants_nationality',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
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
			'key' => 'field_56e04a060dfdb',
			'label' => 'Participant\'s Email and Phone Number',
			'name' => 'participants_email',
			'type' => 'email',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array (
			'key' => 'field_56e81f492dbf7',
			'label' => 'Type of Service Required',
			'name' => 'participants_phone_number',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
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
			'key' => 'field_56e04a1e0dfdc',
			'label' => 'Client\'s Name',
			'name' => 'clients_name',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
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
			'key' => 'field_56e04a300dfdd',
			'label' => 'Client\'s Email and Phone Number',
			'name' => 'clients_email',
			'type' => 'email',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array (
			'key' => 'field_56e04a740c977',
			'label' => 'Courses',
			'name' => 'courses',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
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
					'key' => 'field_56e04a980c978',
					'label' => 'Course Name',
					'name' => 'course_name',
					'type' => 'post_object',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 70,
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
				/*array (
					'key' => 'field_5768211d7ecc4',
					'label' => 'Participant\'s Name',
					'name' => 'sub_participants_name',
					'type' => 'text',
					'instructions' => '',
					'required' => '',
					'conditional_logic' => '',
					'wrapper' => array (
						'width' => 30,
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
				),*/
				array (
					'key' => 'field_5707d3a2f9868',
					'label' => 'Quantity',
					'name' => 'quantity',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '1',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_56e8214a2ce79',
					'label' => 'Price',
					'name' => 'price',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 10,
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_56e820fe2ce78',
					'label' => 'Renewal',
					'name' => 'renewal',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 10,
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'yes' => 'Yes',
						'no' => 'No',
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'Yes',
					'layout' => 'vertical',
				),
				array (
					'key' => 'field_56e8608a68c74',
					'label' => 'Panamanian',
					'name' => 'panamanian',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 10,
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'yes' => 'Yes',
						'no' => 'No',
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'Yes',
					'layout' => 'vertical',
				),
			),
		),
		array (
			'key' => 'field_5707d29b0773c',
			'label' => 'Other Services',
			'name' => 'other_services',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => '',
			'max' => '',
			'layout' => 'table',
			'button_label' => 'Add Row',
			'sub_fields' => array (
				array (
					'key' => 'field_5707d2b30773d',
					'label' => 'Service Name',
					'name' => 'service_name',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
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
					'key' => 'field_5707d2bd0773e',
					'label' => 'Unit Price',
					'name' => 'service_price',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_5707d2d50773f',
					'label' => 'Quantity',
					'name' => 'service_quantity',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '1',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
			),
		),
		array (
			'key' => 'field_572a0b8a5874e',
			'label' => 'Government Fee',
			'name' => 'government_fee',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 5,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56fc7952ff12d',
			'label' => 'Discount',
			'name' => 'discount',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'quotation',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'the_content',
	),
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_562a8d4ef333e',
	'title' => 'Offices',
	'fields' => array (
		array (
			'key' => 'field_562a8d9523a04',
			'label' => 'Number',
			'name' => 'number',
			'type' => 'number',
			'instructions' => 'Office Number',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_562a8dbc23a05',
			'label' => 'Instructors',
			'name' => 'instructors',
			'type' => 'post_object',
			'instructions' => 'Instructors for this office.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array (
				0 => 'instructors',
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
				'value' => 'office',
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
			'key' => 'field_5717bdca9bc27',
			'label' => 'Rank and Compentence',
			'name' => 'rank_competence',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
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
			'key' => 'field_5717c1e06e07f',
			'label' => 'Instructor Code',
			'name' => 'instructor_code',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
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

acf_add_local_field_group(array (
	'key' => 'group_5612fe80f3bfb',
	'title' => 'Certificates',
	'fields' => array (
		array (
			'key' => 'field_5618388c2ff51',
			'label' => 'Participant\'s Name',
			'name' => 'students_name',
			'type' => 'text',
			//'instructions' => 'Full name as it appears in the passport or id.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => 'participant_name',
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
			'key' => 'field_5612fe8fe2a39',
			'label' => 'Passport/ID',
			'name' => 'passport_id',
			'type' => 'text',
			//'instructions' => 'Participant\'s Passport No. or National ID',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => 'passport_id',
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
			'key' => 'field_5612fef2fdc33',
			'label' => 'Place of Birth',
			'name' => 'place_of_birth',
			'type' => 'text',
			//'instructions' => 'Participant\'s country of birth (or nationality).',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => 'nationality',
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
			'key' => 'field_5728ffb5d7616',
			'label' => 'Nationality',
			'name' => 'student_nationality',
			'type' => 'text',
			//'instructions' => 'Participant\'s country of birth (or nationality).',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => 'nationality',
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
			'key' => 'field_5619ac69b2aab',
			'label' => 'Date of Birth',
			'name' => 'date_of_birth',
			'type' => 'date_picker',
			//'instructions' => 'Participant\'s date of birth as seen in passport or id.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => 'nationality',
				'id' => '',
			),
			'display_format' => 'F j, Y',
			'return_format' => 'F j, Y',
			'first_day' => 1,
		),
		/*array (
			'key' => 'field_56536b70f74ed',
			'label' => 'Participant\'s Rank',
			'name' => 'rank',
			'type' => 'text',
			//'instructions' => "Participant's rank as it appears in current seamanbook",
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Rating',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),*/
		array (
			'key' => 'field_561d82af8c0a7',
			'label' => 'Place of Training',
			'name' => 'office',
			'type' => 'taxonomy',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Panama',
			'taxonomy' => 'office',
			'field_type' => 'select',
			'allow_null' => 0,
			'add_term' => 0,
			'save_terms' => 1,
			'load_terms' => 1,
			'return_format' => 'object',
			'multiple' => 0,
		),
		array (
			'key' => 'field_5613068549b90',
			'label' => 'Instructor',
			'name' => 'instructor',
			'type' => 'post_object',
			//'instructions' => 'Choose instructor who gave this course',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => 'instructor-field',
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
			'key' => 'field_5612ff11fdc34',
			'label' => 'Course',
			'name' => 'course',
			'type' => 'post_object',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => 'select_course',
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
			'key' => 'field_56130060acfc8',
			'label' => 'Start Date',
			'name' => 'start_date',
			'type' => 'date_picker',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'display_format' => 'F j, Y',
			'return_format' => 'Ymd',
			'first_day' => 1,
		),
		array (
			'key' => 'field_56130098acfc9',
			'label' => 'End Date',
			'name' => 'end_date',
			'type' => 'date_picker',
			//'instructions' => 'Course end date.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'display_format' => 'F j, Y',
			'return_format' => 'Ymd',
			'first_day' => 1,
		),
		array (
			'key' => 'field_5627dbcdc7f1a',
			'label' => 'Resolution',
			'name' => 'resolution',
			'type' => 'text',
			//'instructions' => 'Resolution Code as per the Country Authority',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'default_value' => 'DGGM-CFM-024-2015',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5627dc4ec7f1b',
			'label' => 'Resolution Date',
			'name' => 'resolution_date',
			'type' => 'text',
			//'instructions' => 'Date the Resolution was passed',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'default_value' => '18 June, 2015',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5619b14370c01',
			'label' => 'Place of Issuance',
			'name' => 'place_of_issuance',
			'type' => 'text',
			//'instructions' => 'Country this certificate was issued.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Panama',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5619b16e70c02',
			'label' => 'Date of Issuance',
			'name' => 'date_of_issuance',
			'type' => 'date_picker',
			//'instructions' => 'Date this certificate was issued.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'display_format' => 'F j, Y',
			'return_format' => 'Ymd',
			'first_day' => 1,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'certificates',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'the_content',
	),
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_560c5feabce0f',
	'title' => 'Courses',
	'fields' => array (
		array (
			'key' => 'field_560c604546237',
			'label' => 'Abbreviation',
			'name' => 'abbr',
			'type' => 'text',
			'instructions' => 'PMTS Course abbreviation.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => 'course-abbr',
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
			'key' => 'field_560c607846238',
			'label' => 'IMO Number',
			'name' => 'imo_no',
			'type' => 'text',
			'instructions' => 'Standard Course IMO Number.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => 'course-number',
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
			'key' => 'field_561eca898f54a',
			'label' => 'Duration in days',
			'name' => 'duration',
			'type' => 'number',
			'instructions' => 'Course duration in days as specified by IMO Standards.',
			'required' => 0,
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
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_568593c6fc37a',
			'label' => 'Duration in hours',
			'name' => 'duration_hours',
			'type' => 'number',
			'instructions' => 'Course duration in hours as specified by IMO Standards.',
			'required' => 0,
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
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_561fd7b315afe',
			'label' => 'Regulation',
			'name' => 'regulation',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
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
			'key' => 'field_56e866046969c',
			'label' => 'Total Panama Certificates',
			'name' => 'total_panama_certificates',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5763ff030088a',
			'label' => 'Total Peru Certificates',
			'name' => 'total_peru_certificates',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5763ff410088c',
			'label' => 'Total Greece Certificates',
			'name' => 'total_greece_certificates',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5763ff250088b',
			'label' => 'Total Egypt Certificates',
			'name' => 'total_egypt_certificates',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_576400380088d',
			'label' => 'Total Guyana Certificates',
			'name' => 'total_guyana_certificates',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5764004d0088e',
			'label' => 'Total South Africa Certificates',
			'name' => 'total_south_africa_certificates',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5764006c0088f',
			'label' => 'Total India Certificates',
			'name' => 'total_india_certificates',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_571a5f405bb83',
			'label' => 'F-TI',
			'name' => 'f_ti',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
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
			'key' => 'field_573234e6a04dd',
			'label' => 'Revision',
			'name' => 'revision',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
			'default_value' => '(10/15) Rev. 14',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56f99e41f9e4c',
			'label' => 'Price Panamanian',
			'name' => 'price_panamanian',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
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
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56f99e54f9e4d',
			'label' => 'Price Panamanian Renewal',
			'name' => 'price_panamanian_renewal',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
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
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56f99e62f9e4e',
			'label' => 'Price Foreign',
			'name' => 'price_foreign',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
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
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56f99e7ff9e50',
			'label' => 'Price Foreign Renewal',
			'name' => 'price_foreign_renewal',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
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
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'courses',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'seamless',
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