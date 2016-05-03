<div class="main">

	<div class="main-content">
		
		<h1>Panama Certificates</h1>

		<?php 
			get_template_part('templates/buttons-div');

			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

			$args = array( 
				'post_type' 		=> 'certificates', 
				'posts_per_page' 	=> 75,
				'meta_key' 			=> 'date_of_issuance',
				'orderby'			=> 'meta_value_num',
				'order'				=> 'DESC',
				'paged'				=> $paged,
			);

			$certs = new WP_Query($args);

			if ( $certs->have_posts() ) :
		?>

		<table class="download-xls-table">
			<thead>
				<tr>
					<th class="middle-title">Participant's Name</th>
					<th class="short-title">Passport/ID No.</th>
					<th class="number">Course (Abbr)</th>
					<th class="number">Start Date</th>
					<th class="number">End Date</th>
					<th class="short-title">Instructor</th>
					<!-- th>Office</th -->
					<th class="number">Issue Date</th>
					<th class="middle-title">Register Code</th>
					<!-- th class="middle-title">Invoice No.</th>
					<th class="short-title">Paid</th -->
					<?php if ( current_user_can('edit_pages') ) : ?>
						<th class="number">Edit</th>
					<?php endif; ?>
				</tr>
			</thead>
			<tbody>
					
			<?php 

				while ( $certs->have_posts() ) : $certs->the_post();

				$edit = '<i class="fa fa-pencil-square-o"></i>';
				$course = get_field('course');
				$instructor = get_field('instructor');
				$office = get_field('office');
				$start_date = DateTime::createFromFormat( 'Ymd', get_field('start_date') );
				$end_date = DateTime::createFromFormat( 'Ymd', get_field('end_date') );
				$issue_date = DateTime::createFromFormat( 'Ymd', get_field('date_of_issuance') );
				$issue_month = $issue_date->format('m');
				$issue_year = $issue_date->format('y');
				$register_code =  get_post_meta(get_the_ID(), 'register_code', true);
				$post_date = get_the_date( date('d/m/y'), get_the_ID() );

				if ( $register_code > 9999 ) {

					$leading_zero = '';

				} elseif ( $register_code > 999 && $register_code <= 9999 ) {

					$leading_zero = '0';

				} elseif ( $register_code > 99 && $register_code <= 999 ) {

					$leading_zero = '00';

				} elseif ( $register_code > 9 && $register_code <= 99 ) {

					$leading_zero = '000';

				} else {

					$leading_zero = '0000';
				}

			?>

				<tr>
					<td>
						<a href="<?php echo the_permalink(); ?>">
							<?php echo the_field('students_name'); ?>
						</a>
					</td>
					<td class="centered">
						<?php echo the_field('passport_id'); ?>
					</td>
					<td class="centered">
						<?php echo $course->abbr; ?>
					</td>
					<td class="centered">
						<?php echo $start_date->format('d/m/y'); ?>
					</td>
					<td class="centered">
						<?php echo $end_date->format('d/m/y'); ?>
					</td>
					<td class="centered">
						<?php echo get_the_title($instructor->ID); ?>
					</td>
					<!-- td class="centered">
						<?php // echo $office; ?>
					</td-->
					<td class="centered">
						<?php echo $issue_date->format('d/m/y'); ?>
					</td>
					<td class="centered">
						<?php echo 'PMTS/' . $course->abbr . '/' . $issue_year . '-01-' . $leading_zero . $register_code; ?>
					</td>
					<!-- td class="centered">
						<?php //if ( get_field('invoice_no') ) : ?>
							<?php //the_field('invoice_no') ; ?>
						<?php //endif; ?>
					</td>
					<td class="centered paid <?php //get_field('paid') ? the_field('paid') : ''; ?>" >
						<?php // if ( get_field('paid') == 'yes' ) : ?>
							<i class="fa fa-check-circle"></i>
						<?php // elseif ( get_field('paid') == 'no') : ?>
							<i class="fa fa-times-circle"></i>
						<?php // endif; ?>
					</td -->

					<?php if ( current_user_can('edit_pages') ) : ?>
						<td class="centered edit">
							<a href="<?php echo the_permalink(); ?>/#acf-form" class="edit-form"><?php echo $edit; ?></a>
						</td>
					<?php endif; ?>

				</tr>

				<?php endwhile; else : ?> 

				<p>There are no certificates yet. To create a new certificate <a href="<?php echo home_url( 'panama-certificates/new-panama-certificate' ); ?>">click here</a>.</p>

				<?php endif; ?>
			</tbody>
		</table>

		<?php if ($certs->max_num_pages > 1) :  ?>

			<div class="paginate">
				<?php previous_posts_link('&#10094; Previous Page'); ?>
				<?php next_posts_link('Next Page &#10095;', $certs->max_num_pages); ?>
			</div>

		<?php endif; ?>

	</div>

</div>