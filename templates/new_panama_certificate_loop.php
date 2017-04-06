<?php get_template_part('templates/search_student_form') ?>

<div class="main">
	
	<div class="main-content">
		
		<div class="buttons">
			
			<a href="<?php echo home_url('panama-certificates'); ?>" class="back-link">

				&laquo; Back to Certificates Table

			</a>

			<a href="<?php echo home_url();?>/panama-certificates/new-panama-certificate?action=clear_session" class="clear-data-button">
				<i class="fa fa-eraser"></i>
				Clear Certificate Data

			</a>

			<a href="#0" class="search-id-no-button not-link">
			
				<i class="fa fa-user" aria-hidden="true"></i>
				Search by ID/Passport No

			</a>

			<?php if (home_url() == 'http://certificate-system:8888') : ?>

			<a href="<?php echo home_url();?>/panama-certificates/new-panama-certificate?action=fill_form_randomly"" class="fill-form-randomly not-link">
				<i class="fa fa-futbol-o" aria-hidden="true"></i>
				Fill Form Randomly

			</a>

			<?php endif; ?>

		</div>

		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

		<?php the_title('<h1>', '</h1>'); ?>

		<?php endwhile; endif;

			$options = array(

				'id' 		=> '',

				'post_id' 	=> 'new_post',

				'new_post'	=> array(
					'post_type'		=> 'certificates',
					'post_status'	=> 'publish'
				),

				'submit_value' => __("Create Certificate", 'certificate-system'),

				'updated_message' => __("Certificate Created", 'certificate-system'),

				'return' => '%post_url%',

			);

			acf_form( $options );

		?>

		<div class="other-certificates">
			<table class="other-certificates-table system">
				<thead>
					<tr>
						<th class="middle-title">Participant's Name</th>
						<th class="short-title">Nationality</th>
						<th class="short-title">Passport/ID No.</th>
						<th class="middle-title">Register Code</th>
						<th class="number">Abbr</th>
						<th class="number">Start Date</th>
						<th class="number">End Date</th>
						<th class="short-title sort">
							Instructor
						</th>
						<th class="number">Issue Date</th>
						<th class="number">Office</th>
						<th class="number">Edit</th>
					</tr>
				</thead>
			</table>
		</div>

	</div>

</div>