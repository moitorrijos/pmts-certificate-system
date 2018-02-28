

<div class="main">

	<div class="main-content">

		<h1>Panama Certificates</h1>

		<div class="back-create-buttons">

			<div class="back-button-link buttons">
				<a href="<?php echo get_permalink( 8 ); ?>" class="back-link">
					&laquo;
					Back to Certificates List
				</a>
			</div>

			<div class="filter-by-date">
				<p>Start Date: <input class="start-date-filter" type="text" placeholder="dd/mm/yyyy"></p>
				<p>End Date: <input class="end-date-filter" type="text" placeholder="dd/mm/yyyy"></p>
				<button id="filter-by-date"><i class="fa fa-filter"></i> &nbsp;Filter by Date</button>
			</div>

			<?php get_template_part('templates/buttons-div'); ?>
			
		</div>

		
		<?php 

			get_template_part('templates/search_certificate_form');

			$cert_paged = ( get_query_var('page') ) ? intval( get_query_var('page') ) : 1;

			$all_certs_args = array( 
				'post_type' 		=> 'certificates',
				'posts_per_page' 	=> 15,
				'meta_key' 			=> 'date_of_issuance',
				'orderby'			=> 'meta_value_num',
				'order'				=> 'DESC',
				'paged' => $paged,
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
							<th class="short-title">Office</th>
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

		<?php
	      if (function_exists('custom_pagination')) {
	        custom_pagination($certs->max_num_pages,"",$paged);
	      }
	    ?>

		<?php else: ?>
			
			<p>
				There are no panama office certificates yet. To create a new certificate 
				<a href="<?php echo home_url( 'panama-certificates/new-panama-certificate' ); ?>">click here</a>.
			</p>

		<?php endif; ?>

	</div>

</div>