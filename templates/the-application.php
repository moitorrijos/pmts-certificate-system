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

			<a href="<?php echo home_url('application-forms/new-application-forms');?>" class="new-certificate-button">

				Create New Application
				
			</a>

		</div>

		<?php 

			if ( have_posts() ) : while ( have_posts() ) : the_post(); 

			$participants_name = get_field('participants_name_app');

			$participants_id = get_field('passport_id_app');

			$participants_place_of_birth = get_field('place_of_birth_app');

			$participants_nationality = get_field('nationality_app');

			$participants_date_of_birth = DateTime::createFromFormat( 'Ymd', get_field('date_of_birth_app') );

			$place_of_training = get_field('place_of_training_app');

			$delivery_mode = get_field('course_deliver_mode_app');

			$courses_taken = get_field('courses_app');

		?>

		<div class="application-form">

			<h2>Application Form No. <?php echo the_title(); ?></h2>

			<h3>Participant Information</h3>

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
			
			<?php endwhile; endif; ?>

		</div>
		
	</div>
</div>