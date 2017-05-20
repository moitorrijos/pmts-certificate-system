<div class="main">

	<div class="main-content">

		<?php

		if( have_posts() ) : while( have_posts() ) : the_post();
		the_title('<h1>', '</h1>'); endwhile;
		endif; wp_reset_query();

		?>

		<div class="back-create-buttons">

			<div class="back-button-link buttons">
				
				<a href="<?php echo get_permalink( 208 ); ?>" class="back-link">
					&laquo;

					Back to Quotation List

				</a>

			</div>

			<?php get_template_part('templates/buttons-div'); ?>
			
		</div>

		<?php

		get_template_part('templates/search_quotation_form');

		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

		$args = array( 
			'post_type' => 'quotation', 
			'posts_per_page' => 18,
			'paged' => $paged,
		);
		
		
		$quotes = new WP_Query($args);

		if ( $quotes->have_posts() ) :
			
		?>

		<table class="system download-xls-table">

			<thead>
				<tr>
					<th class="short-title">Participant's Name</th>
					<th class="short-title">Client's Name</th>
					<th class="short-number">Quotation Number</th>
					<th class="short-title">Services</th>
					<th class="short-number">Ammount</th>
					<th class="short-short-number">Created By</th>
					<th class="short-number">Date</th>
					<th class="short-short-number">Edit</th>
				</tr>
			</thead>

			<tbody class="list">
				
				<?php while ( $quotes->have_posts() ) : $quotes->the_post();
				
					get_template_part( 'templates/quotation_table' );

				endwhile; ?>

			</tbody>

		</table>

		<!-- pagination here -->
	    <?php
	      if (function_exists('custom_pagination')) {
	        custom_pagination($quotes->max_num_pages,"",$paged);
	      }
	    ?>

		<?php else : ?>

		<p>There are no quotes created yet. To create a new quote 

		<a href="<?php echo home_url( 'panama-quotations/new-panama-quotation' ); ?>">click here</a>.

		</p>

		<?php endif; ?>


	</div>

</div>