<div class="main">

	<div class="main-content">

		<h1>Panama Certificates</h1>
		<p class="centered long">All Offices</p>

		<div class="back-create-buttons">

			<div class="back-button-link buttons">
				
				<a href="<?php echo home_url('panama-certificates'); ?>" class="back-link">
					&laquo;

					Back to Certificates List

				</a>
			</div>

			<?php get_template_part('templates/buttons-div'); ?>
			
		</div>

		
		<?php 

			get_template_part('templates/search_certificate_by_id_passport');

			$cert_paged = ( get_query_var('page') ) ? intval(get_query_var('page')) : 1;

			$all_certs_args = array( 
				'post_type' 		=> 'certificates',
				'posts_per_page' 	=> 75,
				'meta_key' 			=> 'date_of_issuance',
				'orderby'			=> 'meta_value_num',
				'order'				=> 'DESC',
				'paged'				=> $cert_paged,
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

		<!-- <?php //if ($certs->max_num_pages > 1) : ?>
			<div class="paginate">
				<p>Page:</p>
				<ul class="pagination">
					<li><?php //echo get_next_posts_link( 'Older Entries', $certs->max_num_pages ); ?></li>
					<li><?php //echo get_previous_posts_link( 'Newer Entries' ); ?></li>
				</ul>
			</div>
		<?php //endif; ?> -->

		<?php else: ?>
			
			<p>There are no panama office certificates yet. To create a new certificate <a href="<?php echo home_url( 'panama-certificates/new-panama-certificate' ); ?>">click here</a>.</p>

		<?php endif; ?>

	</div>

</div>