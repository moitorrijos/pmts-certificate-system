<?php 

if( function_exists('acf_add_local_field_group') ):

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
				'width' => 33,
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
				'width' => 33,
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
				'width' => 33,
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
			'display_format' => 'j F Y',
			'return_format' => 'j F Y',
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
			'add_term' => 1,
			'save_terms' => 1,
			'load_terms' => 1,
			'return_format' => 'object',
			'multiple' => 0,
		),
		array (
			'key' => 'field_585c3c00e273a',
			'label' => 'Course Delivery Mode',
			'name' => 'delivery_mode',
			'type' => 'select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'In Classroom' => 'In Classroom',
				'On Board' => 'On Board',
				'Virtual Training' => 'Virtual Training',
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
			'display_format' => 'j F Y',
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
			'display_format' => 'j F Y',
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
			'default_value' => 'DGGM-CFM-048-2016',
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
			'default_value' => '7 November, 2016',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5657r7dc4ec7f1b',
			'label' => 'Resolution Date',
			'name' => 'resolution_expiry_date',
			'type' => 'text',
			//'instructions' => 'Date the Resolution was passed',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'default_value' => '7 November, 2016',
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
			'display_format' => 'j F Y',
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

endif;