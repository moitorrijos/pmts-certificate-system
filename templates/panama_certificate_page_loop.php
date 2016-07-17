<?php get_template_part('templates/search_by_id_no_form'); ?>

<?php get_template_part('templates/change_office_div'); ?>

<div class="main">

	<div class="main-content">
		
		<h1>Panama Certificates</h1>
		<p class="centered long">Panama Office</p>

		<?php 
			get_template_part('templates/buttons-div');

			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

			$panama_certs_args = array(
				'post_type' 		=> 'certificates',
				'tax_query'			=> array( 
					array(
						'taxonomy' 	=> 'office', 
						'field' 	=> 'name', 
						'terms' 	=> 'Panama'
						)
					),
				'posts_per_page' 	=> -1,
				'meta_key' 			=> 'date_of_issuance',
				'orderby'			=> 'meta_value_num',
				'order'				=> 'DESC',
				'paged'				=> $paged,
			);

			$certs = new WP_Query($panama_certs_args);

			if ( $certs->have_posts() ) :

		?>

				<table class="system download-xls-table">
					<thead>
						<tr>
							<th class="middle-title">Participant's Name</th>
							<th class="short-title">Passport/ID No.</th>
							<th class="number">Course (Abbr)</th>
							<th class="number">Start Date</th>
							<th class="number">End Date</th>
							<th class="short-title">Instructor</th>
							<th class="number">Issue Date</th>
							<th class="middle-title">Register Code</th>
							<?php if ( current_user_can('edit_pages') ) : ?>
								<th class="number">Edit</th>
							<?php endif; ?>
						</tr>
					</thead>
					<tbody>

				<?php while ( $certs->have_posts() ) : $certs->the_post(); ?>

				<?php get_template_part( 'templates/certificate_table' ); ?>

				<?php endwhile; ?>
			
			</tbody>

		</table>

		<?php else: ?>
			
			<p>There are no panama office certificates yet. To create a new certificate <a href="<?php echo home_url( 'panama-certificates/new-panama-certificate' ); ?>">click here</a>.</p>

		<?php endif; ?>

	</div>

</div>