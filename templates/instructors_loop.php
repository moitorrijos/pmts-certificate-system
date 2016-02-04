<div class="main">

	<div class="main-content" id="search-list">
		
		<?php

		$edit = '<i class="fa fa-pencil-square-o"></i>';

		if( have_posts() ) : while( have_posts() ) : the_post();
		the_title('<h1>', '</h1>'); endwhile;
		endif; wp_reset_query();

		?>

		<?php
		 	get_template_part('templates/buttons-div');
		 	get_template_part('templates/search-bar');
		 ?>

		<table class="download-xls-table">
			<thead>
				<tr>
					<th class="short-title">Instructor Name</th>
					<th class="number">Nationality</th>
					<th class="number">Place of Training</th>
					<th class="title">Authorized Courses</th>
					<?php if ( current_user_can( 'edit_pages' ) ) : ?>
						<th class="short-number">Edit</th>
					<?php endif; ?>
				</tr>
			</thead>
			<tbody class="list">
					
				<?php 
					$args = array( 'post_type' => 'instructors', 'posts_per_page' => -1 );
					$instructors = new WP_Query($args);
					if ( $instructors->have_posts() ) : while ( $instructors->have_posts() ) : $instructors->the_post();
				?>

				<tr>
					<td class="list-col-1">
						<?php if ( current_user_can( 'edit_pages' ) ) : ?>
							<a href="<?php echo the_permalink(); ?>"><?php the_title('', ''); ?></a>
						<?php else : ?>
							<?php the_title( '', '' ); ?>
						<?php endif; ?>
					</td>
					<td class="centered list-col-2"><?php the_field('nationality'); ?></td>
					<td class="centered "><?php the_field('instructor_residence'); ?></td>
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
					<?php if ( current_user_can( 'edit_pages') ) : ?>
						<td class="centered edit">
							<a href="<?php echo the_permalink(); ?>" class="edit-form"><?php echo $edit; ?></a>
						</td>
					<?php endif; ?>
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