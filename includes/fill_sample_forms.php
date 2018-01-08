<?php

function fill_form_samples( $field ) {

    $course_ids = array(47, 48, 49, 53, 64, 95, 646, 647, 648, 649, 650, 651, 652, 653, 654, 655, 656, 657, 658, 659, 660, 661, 662, 663, 664, 665, 666, 668, 669, 670, 671, 672, 673, 674, 675, 676, 677, 678, 679, 680, 681, 682, 683, 684, 685, 686, 687, 688, 689, 3214, 3215, 34, 35, 36, 33, 38, 39, 40, 41, 42, 12646, 67, 667);

    if (isset($_GET['action']) && $_GET['action'] == 'fill_form_samples'){

        if ($field['name'] == 'passport_id_app'){
            
            $field['value'] = 'AABBCC999';

        }

        if ($field['name'] == 'participants_name_app'){
            
            $field['value'] = 'John A. Smith';

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

        if ($field['name'] == 'course_delivery_mode_app'){
            
            $field['value'] = 'In Classroom';

        }
        
        if ($field['name'] == 'courses_app'){

            $course_names = array();

            foreach ($course_ids as $course_id) {
                array_push($course_names, array(
                    'field_58839f02e1165' => $course_id, //Course Name Field
                    'field_58839f2ee1166' => 12647,
                    'field_58839fa8e1169' => 20171110
                ));
            }

            $field['value'] = $course_names;

        }

    }

    return $field;

}

add_action( 'acf/load_field', 'fill_form_samples' );