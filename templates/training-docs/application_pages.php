<?php 
	
	if ( have_posts() ) : while ( have_posts() ) : the_post();

	$participants_name = get_field('participants_name_app');

	$participants_id = get_field('passport_id_app');

	$participants_place_of_birth = get_field('place_of_birth_app');

	$participants_nationality = get_field('nationality_app');

	$participants_rank = get_field('rank_app');

	$participants_date_of_birth = DateTime::createFromFormat( 'Ymd', get_field('date_of_birth_app') );

	$place_of_training_slug = get_field('place_of_training_app');

	$place_of_training = get_term_by( 'slug', $place_of_training_slug, 'office' );

	$delivery_mode = get_field('course_deliver_mode_app');

?>
	
	<?php

		if ( have_rows('courses_app') ) : while( have_rows('courses_app') ): the_row(); 
		$course = get_sub_field('course_name_app');
		$instructor = get_sub_field('instructor_name_app');
		$start_date = DateTime::createFromFormat( 'Ymd', get_sub_field('start_date_app') );
		$end_date = DateTime::createFromFormat( 'Ymd', get_sub_field('end_date_app') );
		$observation_test =	get_post_meta( $course->ID, 'observation_test' );

	?>

		<?php if( $instructor && $start_date && $end_date ) : ?>

			<div class="application-for-print">

				<div class="application-page">

					<?php

						echo pmtscs_header_for_print( 'F-SCF-11', '14', $course, $instructor, '1' );

						echo student_info_complete_table(
							$participants_name, 
							$participants_date_of_birth, 
							$participants_id, 
							$place_of_training, 
							$participants_place_of_birth, 
							$participants_nationality, 
							$start_date, 
							$end_date
						);
						
						get_template_part( 'templates/training-docs/days_table' );

						//get_template_part( 'templates/training-docs/terms-conditions' );

						get_template_part( 'templates/training-docs/evaluation-score' );


					?>

					<!-- <div class="application-signatures">

						<?php 
						
							//get_template_part( 'templates/training-docs/applicant-signature' );

							//get_template_part( 'templates/training-docs/instructor-signature' );

							//echo instructor_signature( $instructor ); 
							
						?>
						
					</div> -->

				</div>

				<div class="application-page">
					
					<?php 

						echo pmtscs_header_for_print( 'ATT', '2', $course, $instructor, '2'); 

						echo student_info_short_table( 
							$participants_name, 
							$participants_id, 
							$place_of_training, 
							$end_date 
						);

						get_template_part( 'templates/training-docs/exam_answers' );					

					?>

					<div class="application-signatures">

						<?php get_template_part( 'templates/training-docs/applicant-signature' ); ?>

						<?php //get_template_part( 'templates/training-docs/instructor-signature' ); ?>

						<?php echo instructor_signature( $instructor ); ?>
						
					</div>
					
				</div>

				<?php if ( $observation_test ) : ?>

					<div class="application-page ">
						
						<?php

							echo pmtscs_header_for_print( 'EXAM', '02', $course, $instructor, '3'); 

							echo student_info_short_table( 
								$participants_name, 
								$participants_id, 
								$place_of_training, 
								$end_date 
							);

							echo practical_exam_results( $course );					

						?>

						<div class="application-signatures">

						<?php get_template_part( 'templates/training-docs/applicant-signature' ); ?>

						<?php //get_template_part( 'templates/training-docs/instructor-signature' ); ?>

						<?php echo instructor_signature( $instructor ); ?>
						
					</div>
						
					</div>

				<?php endif; ?>

				<div class="application-page">
					
					<?php 

						if ( $observation_test ) {

							echo pmtscs_header_for_print( 'F-GC-14', '9', $course, $instructor, '4'); 

						} else {

							echo pmtscs_header_for_print( 'F-GC-14', '9', $course, $instructor, '3'); 

						}
						
						echo '<h4 class="short-short">Fecha/Date: <span class="undies">' . $end_date->format('d/m/Y') . '</span></h4>';

						get_template_part( 'templates/training-docs/classroom_instructor_evaluation' );

					?>
					
				</div>

			</div>

		<?php endif; ?>

	<?php endwhile; endif; wp_reset_query(); ?>

<?php endwhile; endif; wp_reset_query(); ?>