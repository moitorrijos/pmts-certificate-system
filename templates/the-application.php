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

			<a href="#0" class="duplicate-certificate-button" id="duplicate-application"><i class="fa fa-clone"></i>
				Duplicate Application
			</a>

			<!-- <a href="#0" class="void-certificate-button"><i class="fa fa-minus-circle"></i>
				Void Application
			</a> -->

			<a href="<?php echo get_permalink(7190);?>" class="new-certificate-button"><i class="fa fa-plus-square"></i>
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
			$place_of_training = get_term_by( 'slug', $place_of_training_slug, 'office' );
			$delivery_mode = get_field('course_deliver_mode_app');

		?>

		<div class="application-form not-for-print" data-post_id="<?php echo the_id(); ?>">

			<div class="full application-sent">

				<p>
					The certificate has been sent to PMTS Main Office for printing. 
					If you need any changes please contact the main office. The local time in Panama is 
					<?php  
						date_default_timezone_set("America/Panama");
						echo date("h:i a");
					?>
				</p>

			</div>

			<div class="full application-sent-error">
				<p>
					Sorry, there was a problem, please try again later. 
					If  you need to send this application please send it via email to 
					<a href="mailto:certificates@panamamaritimetraining.com">
						certificates@panamamaritimetraining.com
					</a>. 
					Local time in Panama is 
					<?php  
						date_default_timezone_set("America/Panama");
						echo date("h:i a");
					?>
				</p>

			</div>

			<h2>Participant Information</h2>

			<div class="full">


				<div class="thirds">
					<p>
						Full Name: 
						<span class="undies">
							<?php echo $participants_name; ?>
						</span>
					</p>
				</div>

				<div class="thirds">
					<p>
						Passport No. or National ID:
						<span class="undies">
							<?php echo $participants_id; ?>
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
						Place of Training
						<span class="undies">
							<?php echo $place_of_training->name; ?>
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
								<th class="number">Abbr</th>
								<th class="short-title">Instructor</th>
								<th class="short-title">Start Date</th>
								<th class="short-title">End Date</th>
								<th class="short-number">Time</th>
								<th class="short-number">Students</th>
								<th class="short-number">
									Print
								</th>
							</tr>
						</thead>

						<?php while( have_rows('courses_app') ): the_row(); ?>

							<?php 

								$course = get_sub_field('course_name_app');
								$instructor = get_sub_field('instructor_name_app');
								$start_date = DateTime::createFromFormat('Ymd', get_sub_field('start_date_app'));
								$end_date = DateTime::createFromFormat('Ymd', get_sub_field('end_date_app'));
								$nightly_course = get_sub_field('night_app');

								(boolean)$class_full = false;
								
								(int)$participant_number = 0;

								(int)$class_limit = 35;
								
								if ($end_date) {
									$end_month = (int)$end_date->format('m');
									
									$participant_number = get_participant_number( 
										(int)$instructor->ID, 
										(int)$course->ID, 
										$end_date->format('Ymd') 
									);
								}
								
								if ( $participant_number >= $class_limit )
								$class_full = true;
							?>

							<tr <?php if ($class_full) { echo 'class ="full-class"'; } ?>>
								<td class="centered">
									<?php echo get_row_index(); ?>		
								</td>
								<td class="course-name" data-course_id="<?php echo $course->ID; ?>">
									<?php echo get_the_title($course->ID); ?>
								</td>
								<td class="centered">
									<?php echo $course->abbr; ?>
								</td>
								<td 
									class="centered course-instructor <?php if( !$instructor ) echo 'reddy'; ?>"
									data-instructor_id="<?php if ( $instructor ) echo $instructor->ID; ?>"
								>
									<?php 
										if( $instructor ) {
											echo $instructor->post_title;
										} else {
											echo '<span class="blackies">TBA</span>' ;
										}
									?>
								</td>
								<td 
									class="centered course-start-date <?php if( !$start_date ) { echo 'reddy'; } ?>"
									data-start_date="<?php if ($start_date) echo $start_date->format('Ymd'); ?>"
								>
									<?php 
										if( $start_date ) { 
											echo $start_date->format('d F Y');
										} else {
											echo '<span class="blackies">TBA</span>' ;
										}
									?>
								</td>
								<td 
									class="centered course-end-date <?php if( !$end_date ) { echo 'reddy'; } ?>"
									data-end_date="<?php if($end_date) echo $end_date->format('Ymd'); ?>"
								>
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
								<td class="centered">
									<?php 
										if ( $instructor && $end_date ) {
											echo $participant_number;
										} else {
											echo "";
										}
									?>
								</td>
								<td class="centered printly">
									<?php
										$certificate_exists = certificate_exists($participants_id, $course);
										if (!$certificate_exists) : 
									?>
										<?php if ( $participant_number > $class_limit ) : ?>
											<span class="warningly">
												<i class="fa fa-ban" aria-hidden="true"></i>
											</span>
										<?php elseif ( !current_user_can( 'moderate_comments' ) ) : ?>
											<span class="lockedly">
												<i class="fa fa-lock" aria-hidden="true"></i>
											</span>
										<?php elseif ($instructor && $start_date && $end_date && !is_next_month($end_month)) : ?>
											<a href="#0" class="create-certificate-button">
												<i class="fa fa-print"></i>
											</a>
										<?php else : ?>
											<span class="warningly">
												<i class="fa fa-times" aria-hidden="true"></i>
											</span>
										<?php endif; ?>
									<?php else : ?>
										<a 
											class="not-link"
											href="<?php echo $certificate_exists[0]->guid; ?>"
											target="_blank"
										>
											<i class="fa fa-external-link"></i>
										</a>
									<?php endif; ?>
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