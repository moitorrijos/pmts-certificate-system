<?php

function fill_form_samples( $field ) {
    
    if (isset($_GET['action']) && $_GET['action'] == 'fill_form_samples') {
    
        $course_ids = array(48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 3214, 3215, 12646, 17529, 17570, 17572, 17573, 17574, 17575, 17576, 17577, 18916, 19225, 23373);
        
        if ($field['name'] == 'participants_name_app'){
            
            $field['value'] = 'John A. Smith';

        }

        if ($field['name'] == 'passport_id_app'){
            
            $field['value'] = 'AABBCC999';

        }

        if ($field['name'] == 'place_of_birth_app'){
            
            $field['value'] = 'U.S.A.';

        }

        if ($field['name'] == 'nationality_app'){
            
            $field['value'] = 'U.S.A.';

        }

        if ($field['name'] == 'date_of_birth_app'){
            
            $field['value'] = '19810704';

        }

        if ($field['name'] == 'place_of_training_app'){
            
            $field['value'] = 'Miami';

        }

        if ($field['name'] == 'course_delivery_mode_app'){
            
            $field['value'] = 'On Board';

        }

        if ($field['name'] == 'passport_id_app'){
            
            $field['value'] = 'AABBCC999';

        }
        
        if ($field['name'] == 'courses_app'){

            $course_names = array();
            
            foreach($course_ids as $course_id) {

                array_push($course_names, array(
                    'field_58839f02e1165' => $course_id,
                    'field_58839f2ee1166' => 121,
                    'field_58839f52e1167' => 20171110,
                    'field_58839fa8e1169' => 20171111,
                    'field_58892d735a1b5' => 0
                ));
            }

            $field['value'] = $course_names;

        }

    }

    return $field;

}

add_action( 'acf/load_field', 'fill_form_samples' );