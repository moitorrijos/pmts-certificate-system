<div class="main">
	
	<div class="main-content" id="search-list">
		
		<h1>Panama Reports</h1>

		<?php 

			get_template_part('templates/buttons-div');
			get_template_part('templates/search-bar');

			$cert_paged = ( get_query_var('paged') ) ? intval(get_query_var('paged')) : 1;

			$all_certs_args = array(
				'post_type' 		=> 'certificates',
				'posts_per_page' 	=> 150,
				'meta_key' 			=> 'date_of_issuance',
				'orderby'			=> 'meta_value_num',
				'order'				=> 'DESC',
				'paged'				=> $cert_paged,
				'tax_query'			=> array(
					array(
						'taxonomy' 	=> 'office',
						'field'		=> 'name',
						'terms'		=> array('Peru', 'Greece', 'Egypt', 'Guyana', 'South Africa', 'India')
					)
				)
			);

			$reports_query = new WP_Query( $all_certs_args );

			if ( $reports_query->have_posts() ) :

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
				
				<?php while ( $reports_query->have_posts() ) : $reports_query->the_post(); ?>

				<?php get_template_part( 'templates/certificate_table' ); ?>

				<?php endwhile; ?>

			</tbody>

		</table>

		<?php if ($reports_query->max_num_pages > 1) : ?>
			<div class="paginate">
				<p>Page:</p>
				<ul class="pagination">
					<li><?php echo get_next_posts_link( 'Older Reports', $reports_query->max_num_pages ); ?></li>
					<li><?php echo get_previous_posts_link( 'Newer Reports' ); ?></li>
				</ul>
			</div>
		<?php endif; ?>

		<?php else : ?>

		<p>There are no reports created yet. To create a new report 

		<a href="<?php echo home_url('/panama-reports/new-panama-reports/'); ?>">click here</a>.

		</p>

		<?php endif; wp_reset_query(); ?>

	</div>

</div>