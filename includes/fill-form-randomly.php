<?php

function fill_form_randomly( $field ) {

	$random_values = array(
		array('Juan Moises Torrijos Oro', '8-747-1801', 'Panama', 'Panamanian', '19810704'),
		array('Mariolga Agreda de Torrijos', 'E-8-129359', 'Venezuela', 'Venezuelan', '19851009'),
		array('Mariana Torrijos Agreda', '8-1151-1492', 'Panama', 'Panamanian', '20131221'),
		array('Luciana Torrijos Agreda', '8-1182-814', 'Panama', 'Panamanian', '20151206')
	);

	$random_int = rand( 0 , 3 );
	$random_office = rand( 3 , 9 );
	$random_instructor = array(110, 112, 116, 118, 121, 122, 131, 183, 347, 349, 350, 351, 352, 356, 357, 358, 359, 360, 361, 362, 506, 508, 565, 566, 567, 568, 569, 570, 571, 572, 573, 574, 575, 576, 577, 578, 579, 581, 582, 584, 585, 586, 587, 588, 589, 590);
	$random_course = rand( 47 , 97 );
	$today = date('Ymd');

	if (isset($_GET['action']) && $_GET['action'] == 'fill_form_randomly'){

		$random_value = $random_values[$random_int];

		if ($field['name'] == 'students_name'){

          $field['value'] = $random_value[0];

      	}

      	if ($field['name'] == 'passport_id'){

          $field['value'] = $random_value[1];

      	}

      	if ($field['name'] == 'place_of_birth'){

          $field['value'] = $random_value[2];

      	}

      	if ($field['name'] == 'student_nationality'){

          $field['value'] = $random_value[3];

      	}
		
		if ($field['name'] == 'date_of_birth'){

          $birthday = date( 'Ymd', strtotime($random_value[4]) ) ;

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