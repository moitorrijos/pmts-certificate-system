<?php get_template_part('templates/search_by_id_no_form'); ?>

<?php get_template_part('templates/change_office_div'); ?>

<div class="main">

	<div class="main-content">
		
		<h1>Panama Certificates</h1>
		<p class="centered long">All Offices</p>

		<?php 
			get_template_part('templates/buttons-div');

			$certs_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

			$all_certs_args = array( 
				'paged'				=> $certs_paged,
				'post_type' 		=> 'certificates',
				'posts_per_page' 	=> 225,
				'meta_key' 			=> 'date_of_issuance',
				'orderby'			=> 'meta_value_num',
				'order'				=> 'DESC',
			);

			$certs = new WP_Query($all_certs_args);

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
		
		<?php //if ( (int) $certs->max_num_pages > 1 ) :  ?>

			<!-- <div class="paginate">
				<?php //next_posts_link('&#10094; Older Certificates', $certs->max_num_pages); ?>
				<?php //previous_posts_link('Newer Certificates &#10095;'); ?>
			</div> -->

		<?php //endif; ?>

		<?php else: ?>
			
			<p>There are no panama office certificates yet. To create a new certificate <a href="<?php echo home_url( 'panama-certificates/new-panama-certificate' ); ?>">click here</a>.</p>

		<?php endif; ?>

	</div>

</div>