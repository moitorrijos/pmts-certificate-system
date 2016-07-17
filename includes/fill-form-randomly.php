<?php

function fill_form_randomly( $field ) {

	$random_values = array(
		array(
			'Juan Moises Torrijos Oro',
			'Mariana Torrijos Agreda',
			'Luciana Torrijos Agreda',
			'Mariolga Agreda de Torrijos'
		),
		array(
			'8-747-1801',
			'8-1151-1492',
			'8-1182-814',
			'E-8-129359'
		),
		array(
			'Panama',
			'Panama',
			'Panama',
			'Venezuela'
		),
		array(
			'Panamanian',
			'Panamanian',
			'Panamanian',
			'Venezuelan'
		),
		array(
			'19810704',
			'20131221',
			'20151206',
			'19851009'
		)
	);

	$random_int = random_int( 0 , 3 );
	$random_office = random_int( 3 , 9 );
	$random_instructor = array(110, 112, 116, 118, 121, 122, 131, 183, 347, 349, 350, 351, 352, 356, 357, 358, 359, 360, 361, 362, 506, 508, 565, 566, 567, 568, 569, 570, 571, 572, 573, 574, 575, 576, 577, 578, 579, 581, 582, 584, 585, 586, 587, 588, 589, 590);
	$random_course = random_int( 47 , 97 );
	$today = date('Ymd');

	if (isset($_GET['action']) && $_GET['action'] == 'fill_form_randomly'){

		if ($field['name'] == 'students_name'){

          $field['value'] = $random_values[0][$random_int];

      	}

      	if ($field['name'] == 'passport_id'){

          $field['value'] = $random_values[1][$random_int];

      	}

      	if ($field['name'] == 'place_of_birth'){

          $field['value'] = $random_values[2][$random_int];

      	}

      	if ($field['name'] == 'student_nationality'){

          $field['value'] = $random_values[3][$random_int];

      	}
		
		if ($field['name'] == 'date_of_birth'){

          $birthday = date( 'Ymd', strtotime($random_values[4][$random_int]) );

          $field['value'] = $birthday;

      	}

      	if ($field['name'] == 'office'){

          $field['value'] = $random_office;
          
      	}
		
		if ($field['name'] == 'instructor'){

          $field['value'] = $random_instructor;
          
      	}

      	if ($field['name'] == 'course'){

          $field['value'] = $random_course;
          
      	}

      	if ($field['name'] == 'start_date'){

         	$field['value'] = $today;
          
      	}

      	if ($field['name'] == 'end_date'){

         	$field['value'] = $today;
          
      	}

      	if ($field['name'] == 'date_of_issuance'){

         	$field['value'] = $today;
          
      	}
		
	}

	return $field;

}

add_action( 'acf/load_field', 'fill_form_randomly' );