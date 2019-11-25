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

	if ( have_rows('courses_app') ) : while( have_rows('courses_app') ): the_row(); 
		$course = get_sub_field('course_name_app');
		$instructor = get_sub_field('instructor_name_app');
		$start_date = DateTime::createFromFormat( 'Ymd', get_sub_field('start_date_app') );
		$end_date = DateTime::createFromFormat( 'Ymd', get_sub_field('end_date_app') );
		$observation_test =	get_post_meta( $course->ID, 'observation_test' );
		$february_2018 = DateTime::createFromFormat('Ymd', '20180228');
		
		if ( $instructor && $start_date && $end_date ) : ?>

			<div class="application-for-print">

				<div class="application-page">

					<?php

						echo pmtscs_header_for_print( 'R-FO1-07', '0', $course, $instructor, '1' );

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

						 if ( $end_date->getTimestamp() <= $february_2018->getTimestamp() ) {
							 get_template_part( 'templates/training-docs/days_table' );
							 get_template_part( 'templates/training-docs/evaluation-score' );
							} else {
								get_template_part( 'templates/training-docs/terms-conditions' );
								get_template_part( 'templates/training-docs/evaluation-score' );
						 }
					?>

					<div class="application-signatures">

						<?php 

							if ( $end_date->getTimestamp() > $february_2018->getTimestamp() ) {
								get_template_part( 'templates/training-docs/applicant-signature' );
							}

						?>
						
					</div>

				</div>
				
				<?php if ($course->ID === 87 || $course->ID === 88 || $course->ID === 74) { //UPCM, UCM, OOWD

					$exam_date_1 = DateTime::createFromFormat('Ymd', '20190531');
					$exam_date_2 = DateTime::createFromFormat('Ymd', '20190615');
					$exam_date_3 = DateTime::createFromFormat('Ymd', '20190629');
					$exam_date_4 = DateTime::createFromFormat('Ymd', '20190710');

					echo '<div class="application-page">';

					echo pmtscs_header_for_print( 'R-FO1-06', '0', $course, $instructor, '2');

					echo student_info_short_table(
						$participants_name, 
						$participants_id, 
						$place_of_training,
						$exam_date_1
					);

					get_template_part( 'templates/training-docs/exam_answers' );

					echo '<div class="application-signatures">';

					get_template_part( 'templates/training-docs/applicant-signature' );

					echo instructor_signature( $instructor );

					echo '</div> </div>';

					echo '<div class="application-page">';

					echo pmtscs_header_for_print( 'R-FO1-06', '0', $course, $instructor, '3');

					echo student_info_short_table(
						$participants_name, 
						$participants_id, 
						$place_of_training, 
						$exam_date_2
					);

					get_template_part( 'templates/training-docs/exam_answers' );

					echo '<div class="application-signatures">';

					get_template_part( 'templates/training-docs/applicant-signature' );

					echo instructor_signature( $instructor );

					echo '</div> </div>';

					echo '<div class="application-page">';

					echo pmtscs_header_for_print( 'R-FO1-06', '0', $course, $instructor, '4');

					echo student_info_short_table(
						$participants_name, 
						$participants_id, 
						$place_of_training, 
						$exam_date_3
					);

					get_template_part( 'templates/training-docs/exam_answers' );

					echo '<div class="application-signatures">';

					get_template_part( 'templates/training-docs/applicant-signature' );

					echo instructor_signature( $instructor );

					echo '</div> </div>';

					echo '<div class="application-page">';

					echo pmtscs_header_for_print( 'R-FO1-06', '0', $course, $instructor, '5');

					echo student_info_short_table(
						$participants_name, 
						$participants_id, 
						$place_of_training, 
						$exam_date_4
					);

					get_template_part( 'templates/training-docs/exam_answers' );

					echo '<div class="application-signatures">';

					get_template_part( 'templates/training-docs/applicant-signature' );

					echo instructor_signature( $instructor );

					echo '</div> </div>';

				} else if ($course->ID === 90) { //UPSE

					$exam_date_1 = DateTime::createFromFormat('Ymd', '20190928');
					$exam_date_2 = DateTime::createFromFormat('Ymd', '20191012');
					$exam_date_3 = DateTime::createFromFormat('Ymd', '20191102');
					$exam_date_4 = DateTime::createFromFormat('Ymd', '20191123');
					
					echo '<div class="application-page">';

					echo pmtscs_header_for_print( 'R-FO1-06', '0', $course, $instructor, '2');

					echo student_info_short_table(
						$participants_name, 
						$participants_id, 
						$place_of_training,
						$exam_date_1
					);

					get_template_part( 'templates/training-docs/exam_answers' );

					echo '<div class="application-signatures">';

					get_template_part( 'templates/training-docs/applicant-signature' );

					echo instructor_signature( $instructor );

					echo '</div> </div>';

					echo '<div class="application-page">';

					echo pmtscs_header_for_print( 'R-FO1-06', '0', $course, $instructor, '3');

					echo student_info_short_table(
						$participants_name, 
						$participants_id, 
						$place_of_training, 
						$exam_date_2
					);

					get_template_part( 'templates/training-docs/exam_answers' );

					echo '<div class="application-signatures">';

					get_template_part( 'templates/training-docs/applicant-signature' );

					echo instructor_signature( $instructor );

					echo '</div> </div>';

					echo '<div class="application-page">';

					echo pmtscs_header_for_print( 'R-FO1-06', '0', $course, $instructor, '4');

					echo student_info_short_table(
						$participants_name, 
						$participants_id, 
						$place_of_training, 
						$exam_date_3
					);

					get_template_part( 'templates/training-docs/exam_answers' );

					echo '<div class="application-signatures">';

					get_template_part( 'templates/training-docs/applicant-signature' );

					echo instructor_signature( $instructor );

					echo '</div> </div>';

					echo '<div class="application-page">';

					echo pmtscs_header_for_print( 'R-FO1-06', '0', $course, $instructor, '5');

					echo student_info_short_table(
						$participants_name, 
						$participants_id, 
						$place_of_training, 
						$exam_date_4
					);

					get_template_part( 'templates/training-docs/exam_answers' );

					echo '<div class="application-signatures">';

					get_template_part( 'templates/training-docs/applicant-signature' );

					echo instructor_signature( $instructor );

					echo '</div> </div>';
					
				} ?>

					<div class="application-page">
						
						<?php 

							echo pmtscs_header_for_print( 'R-FO1-06', '0', $course, $instructor, '2'); 

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

							<?php echo instructor_signature( $instructor ); ?>
							
						</div>
						
					</div>

				<?php if ( $observation_test ) : ?>

					<div class="application-page ">
						
						<?php

							echo pmtscs_header_for_print( 'R-FO1-04', '0', $course, $instructor, '3'); 

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

						<?php echo instructor_signature( $instructor ); ?>
						
					</div>
						
					</div>

				<?php endif; ?>

				<div class="application-page">
					
					<?php 

						if ($course->ID === 87 || $course->ID === 88) {

							echo pmtscs_header_for_print( 'R-DE2-01', '0', $course, $instructor, '7'); 

						} else if ( $observation_test ) {
							
							echo pmtscs_header_for_print( 'R-DE2-01', '0', $course, $instructor, '4'); 

						} else {

							echo pmtscs_header_for_print( 'R-DE2-01', '0', $course, $instructor, '3'); 

						}
						
						echo '<h4 class="short-short">Fecha/Date: <span class="undies">' . $end_date->format('d/m/Y') . '</span></h4>';

						get_template_part( 'templates/training-docs/classroom_instructor_evaluation' );

					?>
					
				</div>

			</div>

		<?php endif; ?>

	<?php endwhile; endif; wp_reset_query(); ?>

<?php endwhile; endif; wp_reset_query(); ?>