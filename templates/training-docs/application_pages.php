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
		$observation_test =	get_field( 'observation_test', $course->ID );
		$practical_exam_results = get_field('practical_exam_results', $course->ID);

		$february_2018 = DateTime::createFromFormat('Ymd', '20180228');
		$january_2022 = DateTime::createFromFormat('Ymd', '20220101');

		if ( $practical_exam_results && ($start_date->getTimestamp() > $january_2022->getTimestamp()) ) {
			$total_page_number = '5';
		} else if ($observation_test) {
			$total_page_number = '4';
		} else {
			$total_page_number = '3';
		}
		if ( $instructor && $start_date && $end_date ) : ?>

			<div class="application-for-print">

				<div class="application-page">

					<?php

						echo pmtscs_header_for_print( 'R-FO1-07', $course, $instructor, '1', $total_page_number );

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
							} else {
								get_template_part( 'templates/training-docs/terms-conditions' );
							}
							get_template_part( 
								'templates/training-docs/evaluation-score',
								'',
								array(
									'observation_test' => $observation_test,
									'start_date' => $start_date,
									'january_2022' => $january_2022
								)
							);
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

					$exam_date_1 = DateTime::createFromFormat('Ymd', '20191116');
					$exam_date_2 = DateTime::createFromFormat('Ymd', '20191207');
					$exam_date_3 = DateTime::createFromFormat('Ymd', '20171221');
					$exam_date_4 = DateTime::createFromFormat('Ymd', '20191230');

					echo '<div class="application-page">';

					echo pmtscs_header_for_print( 'R-FO1-06', $course, $instructor, '2', $total_page_number);

					echo student_info_short_table(
						$participants_name, 
						$participants_id, 
						$place_of_training,
						$exam_date_1
					);

					get_template_part( 'templates/training-docs/exam_answers', '', array('start_date' => $start_date, 'january_2022' => $january_2022) );

					echo '<div class="application-signatures">';

					get_template_part( 'templates/training-docs/applicant-signature' );

					echo instructor_signature( $instructor );

					echo '</div> </div>';

					echo '<div class="application-page">';

					echo pmtscs_header_for_print( 'R-FO1-06', $course, $instructor, '3', $total_page_number);

					echo student_info_short_table(
						$participants_name, 
						$participants_id, 
						$place_of_training, 
						$exam_date_2
					);

					get_template_part( 'templates/training-docs/exam_answers', '', array('start_date' => $start_date, 'january_2022' => $january_2022) );

					echo '<div class="application-signatures">';

					get_template_part( 'templates/training-docs/applicant-signature' );

					echo instructor_signature( $instructor );

					echo '</div> </div>';

					echo '<div class="application-page">';

					echo pmtscs_header_for_print( 'R-FO1-06', $course, $instructor, '4', $total_page_number );

					echo student_info_short_table(
						$participants_name, 
						$participants_id, 
						$place_of_training, 
						$exam_date_3
					);

					get_template_part( 'templates/training-docs/exam_answers', '', array('start_date' => $start_date, 'january_2022' => $january_2022) );

					echo '<div class="application-signatures">';

					get_template_part( 'templates/training-docs/applicant-signature' );

					echo instructor_signature( $instructor );

					echo '</div> </div>';

					echo '<div class="application-page">';

					echo pmtscs_header_for_print( 'R-FO1-06', $course, $instructor, '5', $total_page_number);

					echo student_info_short_table(
						$participants_name, 
						$participants_id, 
						$place_of_training, 
						$exam_date_4
					);

					get_template_part( 'templates/training-docs/exam_answers', '', array('start_date' => $start_date, 'january_2022' => $january_2022) );

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

					echo pmtscs_header_for_print( 'R-FO1-06', $course, $instructor, '2', $total_page_number);

					echo student_info_short_table(
						$participants_name, 
						$participants_id, 
						$place_of_training,
						$exam_date_1
					);

					get_template_part( 'templates/training-docs/exam_answers', '', array('start_date' => $start_date, 'january_2022' => $january_2022) );

					echo '<div class="application-signatures">';

					get_template_part( 'templates/training-docs/applicant-signature' );

					echo instructor_signature( $instructor );

					echo '</div> </div>';

					echo '<div class="application-page">';

					echo pmtscs_header_for_print( 'R-FO1-06', $course, $instructor, '3', $total_page_number);

					echo student_info_short_table(
						$participants_name, 
						$participants_id, 
						$place_of_training, 
						$exam_date_2
					);

					get_template_part( 'templates/training-docs/exam_answers', '', array('start_date' => $start_date, 'january_2022' => $january_2022) );

					echo '<div class="application-signatures">';

					get_template_part( 'templates/training-docs/applicant-signature' );

					echo instructor_signature( $instructor );

					echo '</div> </div>';

					echo '<div class="application-page">';

					echo pmtscs_header_for_print( 'R-FO1-06', $course, $instructor, '4', $total_page_number);

					echo student_info_short_table(
						$participants_name, 
						$participants_id, 
						$place_of_training, 
						$exam_date_3
					);

					get_template_part( 'templates/training-docs/exam_answers', '', array('start_date' => $start_date, 'january_2022' => $january_2022) );

					echo '<div class="application-signatures">';

					get_template_part( 'templates/training-docs/applicant-signature' );

					echo instructor_signature( $instructor );

					echo '</div> </div>';

					echo '<div class="application-page">';

					echo pmtscs_header_for_print( 'R-FO1-06', $course, $instructor, '5', $total_page_number);

					echo student_info_short_table(
						$participants_name, 
						$participants_id, 
						$place_of_training, 
						$exam_date_4
					);

					get_template_part( 'templates/training-docs/exam_answers', '', array('start_date' => $start_date, 'january_2022' => $january_2022) );

					echo '<div class="application-signatures">';

					get_template_part( 'templates/training-docs/applicant-signature' );

					echo instructor_signature( $instructor );

					echo '</div> </div>';
					
				} ?>

					<div class="application-page">
						
						<?php 

							echo pmtscs_header_for_print( 'R-FO1-06', $course, $instructor, '2', $total_page_number); 

							echo student_info_short_table( 
								$participants_name, 
								$participants_id, 
								$place_of_training, 
								$end_date 
							);

							get_template_part( 'templates/training-docs/exam_answers', '', array('start_date' => $start_date, 'january_2022' => $january_2022) );					

						?>

						<div class="application-signatures">

							<?php get_template_part( 'templates/training-docs/applicant-signature' ); ?>

							<?php echo instructor_signature( $instructor ); ?>
							
						</div>
						
					</div>

				<?php if ( $observation_test ) : ?>

					<div class="application-page
						<?php if ($practical_exam_results && ($start_date->getTimestamp() > $january_2022->getTimestamp())) { echo 'span-2-pages'; } ?>"
					>
						
						<?php

							echo pmtscs_header_for_print( 'R-FO1-04', $course, $instructor, '3', $total_page_number); 

							echo student_info_short_table( 
								$participants_name, 
								$participants_id, 
								$place_of_training, 
								$end_date 
							);

							echo practical_exam_results( $course, $start_date, $january_2022 );

						?>

						<?php if (!$practical_exam_results) : ?>

							<div class="application-signatures">

								<?php get_template_part( 'templates/training-docs/applicant-signature' ); ?>

								<?php echo instructor_signature( $instructor ); ?>

							</div>

						<?php endif; ?>
						
					</div>

					<?php if (($start_date->getTimestamp() > $january_2022->getTimestamp()) && $practical_exam_results) : ?>

						<div class="application-page">

							<?php

								echo pmtscs_header_for_print( 'R-FO1-04', $course, $instructor, '4', $total_page_number);

								echo student_info_short_table( 
									$participants_name, 
									$participants_id, 
									$place_of_training, 
									$end_date 
								);
								
								get_template_part( 'templates/training-docs/qualification_criteria' );

							?>

							<div class="application-signatures">

								<?php get_template_part( 'templates/training-docs/applicant-signature' ); ?>

								<?php echo instructor_signature( $instructor ); ?>

							</div>

						</div>

					<?php endif; ?>

				<?php endif; ?>

				<div class="application-page">
					
					<?php 

						if ($course->ID === 87 || $course->ID === 88) {

							echo pmtscs_header_for_print( 'R-DE2-01', $course, $instructor, '7', $total_page_number); 

						} else if ( $observation_test ) {
							
							echo pmtscs_header_for_print( 'R-DE2-01', $course, $instructor, $total_page_number, $total_page_number); 

						} else {

							echo pmtscs_header_for_print( 'R-DE2-01', $course, $instructor, '3', $total_page_number); 

						}
						
						echo '<h4 class="short-short">Fecha/Date: <span class="undies">' . $end_date->format('d/m/Y') . '</span></h4>';

						get_template_part( 'templates/training-docs/classroom_instructor_evaluation' );

					?>
					
				</div>

			</div>

		<?php endif; ?>

	<?php endwhile; endif; wp_reset_query(); ?>

<?php endwhile; endif; wp_reset_query(); ?>