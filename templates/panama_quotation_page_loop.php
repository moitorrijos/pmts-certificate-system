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
		
		$edit = '<i class="fa fa-pencil-square-o"></i>';
		$quotes = new WP_Query($args);

		if ( $quotes->have_posts() ) :
			
		?>

		<table class="system download-xls-table">

			<thead>
				<tr>
					<th class="short-title">Participant's Name</th>
					<th class="number">Client's Name</th>
					<th class="short-number">Quotation Number</th>
					<th class="short-title">Services</th>
					<th class="short-number">Ammount</th>
					<th class="short-short-number">Created By</th>
					<th class="short-number">Date</th>
					<th class="short-short-number">Edit</th>
				</tr>
			</thead>

			<tbody class="list">
				
				<?php while ( $quotes->have_posts() ) : $quotes->the_post(); ?>
				
				<tr>
					<td class="list-col-1">
						<a href="<?php echo the_permalink(); ?>">
							<?php the_field('participants_name'); ?>
						</a>
					</td>
					<td class="list-col-2">
						<?php the_field('clients_name'); ?>
					</td>
					<td class="centered list-col-3"><?php echo get_the_title(); ?></td>
					<td class="centered">
						<?php

							if( have_rows('courses') ):

						 	// loop through the rows of data
						    while ( have_rows('courses') ) : the_row();

								$course_name = get_sub_field('course_name');

						        // display a sub field value
						        $course_abbr = $course_name->abbr;

						        if (get_row_index() != 1) { echo ', '; }

						        echo $course_abbr;

						    endwhile; endif;

						    if( have_rows('other_services') ):

						 	// loop through the rows of data
						    while ( have_rows('other_services') ) : the_row();

								$service_name = get_sub_field('service_name');

								// if (get_row_index() != 1) { echo ', '; }
								echo ', ';

						        // display a sub field value
						        echo $service_name;

						    endwhile; endif;

						    // the_field('participants_phone_number');

						 ?>
					</td>
					<td class="centered">
						<?php 

							if( have_rows('courses') ) :

							 	// loop through the rows of data
							    while ( have_rows('courses') ) : the_row();

									$courses_price_sum = array();

									$course_price = get_sub_field('price');

									$course_quantity = get_sub_field('quantity');

									if ($course_price) {

										$course_prices = (float)$course_price * (float)$course_quantity;
										
										array_push($courses_price_sum, (float)$course_prices);

									}

								endwhile; 

							endif;

							if ($courses_price_sum) {

								$courses_price_sum = array_reduce($courses_price_sum, 'pmtscs_price_sum');
								
							}

							if( have_rows('other_services') ):

							 	// loop through the rows of data
							    while ( have_rows('other_services') ) : the_row();

									$services_price_sum = array();

								    $service_price = get_sub_field('service_price');

								    $service_quantity = get_sub_field('service_quantity');

								    if ($service_price) {

								    	$service_prices = (float)$service_price * (float)$service_quantity;
								    	
								    	array_push($services_price_sum, (int)$service_prices);

								    }

								endwhile;

							endif;

							if ($services_price_sum) {

								$services_price_sum = array_reduce($services_price_sum, 'pmtscs_price_sum');
								
							}

							// var_dump($services_price_sum);

							echo '$' . number_format(($courses_price_sum + $services_price_sum), 2);

						 ?>
					</td>
					
					<td class="centered"><?php echo get_the_author(); ?></td>
					<td class="centered list-col-4"><?php echo get_the_date('d/m/Y'); ?></td>
					<td class="centered edit">
						<a href="<?php echo the_permalink(); ?>" class="edit-form"><?php echo $edit; ?></a>
					</td>
				</tr>

				<?php endwhile; ?>

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