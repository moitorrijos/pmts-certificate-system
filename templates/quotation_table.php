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
		        echo $course_name->abbr . ', ';

		    endwhile; endif;

		    if( have_rows('other_services') ):

		 	// loop through the rows of data
		    while ( have_rows('other_services') ) : the_row();

				$service_name = get_sub_field('service_name');

		        // display a sub field value
		        echo $service_name . ', ';

		    endwhile; endif;

		    // the_field('participants_phone_number');

		 ?>
	</td>
	<td class="centered"><?php echo get_the_author(); ?></td>
	<td class="centered list-col-4"><?php echo get_the_date('d/m/Y'); ?></td>
	<td class="centered edit">
		<a href="<?php echo the_permalink(); ?>" class="edit-form">
			<i class="fa fa-pencil-square-o"></i>
		</a>
	</td>
</tr>