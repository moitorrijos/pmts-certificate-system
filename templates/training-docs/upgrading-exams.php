<?php

$participants_name = get_field('participants_name_app');
$participants_id = get_field('passport_id_app');
$place_of_training_slug = get_field('place_of_training_app');
$place_of_training = get_term_by( 'slug', $place_of_training_slug, 'office' );
$course = get_sub_field('course_name_app');
$instructor = get_sub_field('instructor_name_app');
$exam_date = DateTime::createFromFormat('Ymd', '20180203');

echo pmtscs_header_for_print( 'R-FO1-06', '0', $course, $instructor, '4');

echo student_info_short_table(
	$participants_name, 
	$participants_id, 
	$place_of_training, 
	$exam_date
);

get_template_part( 'templates/training-docs/exam_answers' );

?>

<div class="application-signatures">

<?php get_template_part( 'templates/training-docs/applicant-signature' ); ?>

<?php echo instructor_signature( $instructor ); ?>

</div>