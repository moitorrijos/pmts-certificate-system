<?php

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_60e33c377c1b5asdfh',
		'title' => 'Refresher Resolutions',
		'fields' => array(
			array(
				'key' => 'field_60e33c553ad6easdfh',
				'label' => 'Date of issuance',
				'name' => 'ref_resolution_issue_date',
				'type' => 'date_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'display_format' => 'j F Y',
				'return_format' => 'Ymd',
				'first_day' => 1,
			),
			array(
				'key' => 'field_60e33c7f3ad6fasdfh',
				'label' => 'Expiry date',
				'name' => 'ref_resolution_expiry_date',
				'type' => 'date_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'display_format' => 'j F Y',
				'return_format' => 'Ymd',
				'first_day' => 1,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'ref_resolutions',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => array(
			0 => 'permalink',
			1 => 'the_content',
			2 => 'excerpt',
			3 => 'discussion',
			4 => 'comments',
			5 => 'slug',
			6 => 'format',
			7 => 'page_attributes',
			8 => 'featured_image',
			9 => 'categories',
			10 => 'tags',
			11 => 'send-trackbacks',
		),
		'active' => true,
		'description' => '',
	));
	
	endif;