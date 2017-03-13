<div class="main">
	
	<div class="main-content">
		
		<div class="buttons">
			
			<a href="<?php echo home_url( 'application-forms' ); ?>" class="back-link">
				
				&laquo;

				Back to Application Forms

			</a>

			<a href="#0" class="edit-button not-link"><i class="fa fa-pencil"></i>

					Edit Application

				</a>

			<a href="#0" class="print-button not-link"><i class="fa fa-print"></i>

				Print Application

			</a>

			<a href="#0" class="view-button not-link"><i class="fa fa-eye"></i>

				View Application

			</a>

			<a href="<?php echo home_url('application-forms/new-application-form');?>" class="new-certificate-button">

				Create New Application
				
			</a>

		</div>

		<?php 

			if ( have_posts() ) : while ( have_posts() ) : the_post(); 

			$participants_name = get_field('participants_name_app');

			$participants_id = get_field('passport_id_app');

			$participants_place_of_birth = get_field('place_of_birth_app');

			$participants_nationality = get_field('nationality_app');

			$participants_rank = get_field('rank_app');

			$participants_date_of_birth = DateTime::createFromFormat( 'Ymd', get_field('date_of_birth_app') );

			$place_of_training_slug = get_field('place_of_training_app');

			$place_of_training = get_term_by( 'slug', '01', 'office' );

			$delivery_mode = get_field('course_deliver_mode_app');

		?>

		<div class="application-form not-for-print">

			<h2>Participant Information</h2>

			<div class="full">


				<div class="half">
					
					<p>
						Full Name: 

						<span class="undies">

							<?php echo $participants_name; ?>
							
						</span>

					</p>

					
				</div>

				<div class="half">
					
					<p>

						Passport No. or National ID:

						<span class="undies">
						
							<?php echo $participants_id; ?>

						</span>

					</p>

				</div>
				
			</div>

			<div class="full">
				
				<div class="thirds">
					
					<p>
						
						Place of Birth:

						<span class="undies">

							<?php echo $participants_place_of_birth; ?>

						</span>

					</p>

				</div>

				<div class="thirds">
					
					<p>
						
						Nationality:

						<span class="undies">
							
							<?php echo $participants_nationality; ?>

						</span>

					</p>

				</div>

				<div class="thirds">
					
					<p>
						
						Date of Birth:

						<span class="undies">
							
							<?php echo $participants_date_of_birth->format('d F Y'); ?>

						</span>

					</p>

				</div>

			</div>

				<?php if( have_rows('courses_app') ) : ?>

					<h2>Course Information</h2>
				
					<table class="system">
						
						<thead>
							<tr>
								<th class="short-number">No.</th>
								<th class="title">Course Name</th>
								<th class="short-title">Instructor</th>
								<th class="short-title">Start Date</th>
								<th class="short-title">End Date</th>
								<th class="number">Time</th>
							</tr>
						</thead>

						<?php while( have_rows('courses_app') ): the_row(); ?>

							<?php 

								$course = get_sub_field('course_name_app');
								$instructor = get_sub_field('instructor_name_app');
								$start_date = DateTime::createFromFormat('Ymd', get_sub_field('start_date_app'));
								$end_date = DateTime::createFromFormat('Ymd', get_sub_field('end_date_app'));
								$nightly_course = get_sub_field('night_app');

							?>

							<tr>
								<td class="centered">
									<?php echo get_row_index(); ?>		
								</td>
								<td>
									<?php if ($course->imo_no) : ?>

										Course IMO No. <?php echo $course->imo_no; ?>

									<?php endif; ?>

									<?php echo get_the_title($course->ID); ?>
									<?php 
										if ( $course->ID != 97 ) {
											echo ' (' .  $course->abbr . ')';
										}
									 ?>
								</td>
								<td class="centered <?php if( !$instructor ) { echo 'reddy'; } ?>">
									<?php 

										if( $instructor ) {

											echo $instructor->post_title;

										} else {

											echo '<span class="blackies">TBA</span>' ;

										}

									?>
								</td>
								<td class="centered <?php if( !$start_date ) { echo 'reddy'; } ?>">
									<?php 

										if( $start_date ) { 

											echo $start_date->format('d F Y');

										} else {

											echo '<span class="blackies">TBA</span>' ;

										}
									?>
								</td>
								<td class="centered <?php if( !$end_date ) { echo 'reddy'; } ?>">
									<?php 

										if( $end_date ) { 

											echo $end_date->format('d F Y');

										} else {

											echo '<span class="blackies">TBA</span>' ;

										}
									?>
								</td>
								<td class="centered <?php if ( $nightly_course ) { echo 'nightly'; } else { echo 'daily'; } ?>">
									<?php if( $nightly_course ) { echo "Night"; } else { echo "Day"; } ?>
								</td>
							</tr>

						<?php endwhile; ?>

					</table>

				<?php endif; wp_reset_query(); ?>

			<?php endwhile; endif; wp_reset_query(); ?>

		</div>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div class="edit-application-form">
			
				<?php 
						
					$app_edit_form = array(
						'updated_message' => __("Application Updated", 'certificate-system'),
					);

					acf_form($app_edit_form);

				?>

			</div>

		<?php endwhile; endif; wp_reset_query(); ?>

		<?php get_template_part( 'templates/training-docs/application_pages' ); ?>
		
	</div>

</div>