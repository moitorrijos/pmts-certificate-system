

<div class="main">

	<div class="main-content">

		<h1>Panama Certificates</h1>
		<p class="centered long">Panama Office</p>

		<div class="back-create-buttons">

			<div class="back-button-link buttons">
				
				<a href="<?php echo home_url(); ?>" class="back-link">
					&laquo;

					Back to Certificates List

				</a>
			</div>

			<?php get_template_part('templates/buttons-div'); ?>
			
		</div>

		
		<?php 

			get_template_part('templates/search_certificate_form');

			$cert_paged = ( get_query_var('page') ) ? intval(get_query_var('page')) : 1;

			$all_certs_args = array( 
				'post_type' 		=> 'certificates',
				// 'posts_per_page' 	=> -1,
				'posts_per_page' 	=> 55,
				// 'meta_key' 			=> 'date_of_issuance',
				// 'orderby'			=> 'meta_value_num',
				'order'				=> 'DESC',
				'paged'				=> $cert_paged,
				// 'tax_query'			=> array( 
				// 	array(
				// 		'taxonomy' 	=> 'office', 
				// 		'field' 	=> 'name', 
				// 		'terms' 	=> 'Panama'
				// 		)
				// ),
				// 'meta_query'		=> array(
				// 	array(
				// 		'key'	=> 'date_of_issuance',
				// 		'value'	=> array(20170601, 20170630),
				// 		'compare' => 'BETWEEN',
				// 	),
				// ),
				// 'date_query'	=> array(
				// 	array(
				// 		'after' => array(
				// 			'year'	=> 2017,
				// 			'month'	=> 1,
				// 			'day'	=> 4,
				// 		),
				// 		'before' => array(
				// 			'year' => 2017,
				// 			'month' => 1,
				// 			'day' => 5,
				// 		),
				// 		'inclusive' => true,
				// 	),
				// ),

			);

			$certs = new WP_Query($all_certs_args);

			if ( $certs->have_posts() ) : 

		?>

				<table class="system download-xls-table">
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
							<?php if ( current_user_can('edit_pages') ) : ?>
								<th class="number">Edit</th>
							<?php endif; ?>
						</tr>
					</thead>
					<tbody class="list">

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