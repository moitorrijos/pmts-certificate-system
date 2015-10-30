<div class="main">

	<div class="main-content">
		
		<?php

		if( have_posts() ) : while( have_posts() ) : the_post();
		the_title('<h1>', '</h1>'); endwhile;
		endif; wp_reset_query();

		?>

		<?php get_template_part('templates/buttons-div'); ?>

		<table class="download-xls-table">
			<thead>
				<tr>
					<th class="short-title">Instructor's Name</th>
					<th class="number">Nationality</th>
					<th class="number">Place of Training</th>
					<th class="title">Authorized Courses</th>
				</tr>
			</thead>
			<tbody>
					
				<?php 
					$args = array( 'post_type' => 'instructors', 'posts_per_page' => -1 );
					$instructors = new WP_Query($args);
					if ( $instructors->have_posts() ) : while ( $instructors->have_posts() ) : $instructors->the_post();
				?>

				<tr>
					<td><a href="<?php echo the_permalink(); ?>"><?php the_title('', ''); ?></a></td>
					<td class="centered"><?php the_field('nationality'); ?></td>
					<td class="centered"><?php the_field('instructor_residence'); ?></td>
					<td>
						<?php 
							$authorized_courses = get_field( 'authorized_courses' );

							if ( $authorized_courses ) {
								foreach ( $authorized_courses as $authorized_course ) {
									echo get_the_title( $authorized_course->ID ) . ' · ';
								}
							}
						?>
					</td>
				</tr>

				<?php endwhile; else : ?>

				<tr>
					<td> no data. </td>
					<td> no data. </td>
					<td> no data. </td>
					<td> no data. </td>
					<td> no data. </td>
					<td> no data. </td>
					<td> no data. </td>
					<td> no data. </td>
				</tr>

				<?php endif; ?>
			</tbody>
		</table>

	</div>

</div>