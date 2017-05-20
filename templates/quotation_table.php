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

			$edit = '<i class="fa fa-pencil-square-o"></i>';
			$link = '<i class="fa fa-external-link"></i>';

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
			
			$courses_price_sum = array();

			if( have_rows('courses') ) :

			 	// loop through the rows of data
			    while ( have_rows('courses') ) : the_row();
			    	
			    	$course = get_sub_field('course_name');
					$is_panamanian = get_sub_field('panamanian');
					$is_renewal = get_sub_field('renewal');
					if ( get_sub_field('price') ) {
						$course_price = get_sub_field('price');
					} elseif ( $is_panamanian == "yes" && $is_renewal == "no" ) {
						$course_price = $course->price_panamanian;
					} elseif ( $is_panamanian == "no" && $is_renewal =="no" ) {
						$course_price = $course->price_foreign;
					} elseif ( $is_panamanian == "yes"  && $is_renewal == "yes" ) {
						$course_price = $course->price_panamanian_renewal;
					} elseif ( $is_panamanian == "no" && $is_renewal == "yes" ) {
						$course_price = $course->price_foreign_rewal;
					}

					$course_quantity = get_sub_field('quantity');

					if ($course_price) {

						$course_prices = (float)$course_price * (float)$course_quantity;
						
						array_push($courses_price_sum, (float)$course_prices);

					}

				endwhile; 

			endif;

			$count_courses_taken = count($courses_price_sum);

			$services_price_sum = array();
				
			if( have_rows('other_services') ):

			 	// loop through the rows of data
			    while ( have_rows('other_services') ) : the_row();

				    $service_price = get_sub_field('service_price');

				    $service_quantity = get_sub_field('service_quantity');

				    if ($service_price) {

				    	$service_prices = (float)$service_price * (float)$service_quantity;
				    	
				    	array_push($services_price_sum, (float)$service_prices);

				    }

				endwhile;

			endif;

			if ( $courses_price_sum && is_array($courses_price_sum) ) {

				$government_fee = get_field('government_fee');

				$courses_price_sum = array_reduce($courses_price_sum, 'pmtscs_price_sum');

				$courses_price_sum = $courses_price_sum + ($count_courses_taken * $government_fee);
				
			} else {

				$courses_price_sum = 0;
			}

			if ( $services_price_sum && is_array($services_price_sum) ) {

				$services_price_sum = array_reduce($services_price_sum, 'pmtscs_price_sum');
				
			} else {

				$services_price_sum = 0;

			}

			echo '$' . number_format(($courses_price_sum + $services_price_sum), 2);

		 ?>
	</td>
	
	<td class="centered"><?php echo get_the_author(); ?></td>
	<td class="centered list-col-4"><?php echo get_the_date('d/m/Y'); ?></td>
	<td class="centered edit">		
		<a href="<?php echo the_permalink(); ?>" class="edit-form">
			<?php
				if ( current_user_can( 'edit_pages' ) ) :
					echo $edit;
				else :
					echo $link;
				endif;
			?>	
		</a>
	</td>
</tr>