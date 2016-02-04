<div class="main">

	<div class="main-content" id="search-list">

		<?php

		if( have_posts() ) : while( have_posts() ) : the_post();
		the_title('<h1>', '</h1>'); endwhile;
		endif; wp_reset_query();

		?>

		<?php

			get_template_part('templates/buttons-div');
			get_template_part('templates/search-bar' );

		?>

		<table class="download-xls-table">

			<thead>
				<tr>
					<th class="number">IMO No.</th>
					<th class="title">Course Name</th>
					<th class="number">Abbr</th>
					<th class="short-number">Duration in days</th>
					<th class="short-number">Duration in hours</th>
					<th class="short-number">Total Certificates</th>
					<th class="short-number">Edit</th>
				</tr>
			</thead>

			<tbody class="list">

				<?php
					$edit = '<i class="fa fa-pencil-square-o"></i>';
					$args = array( 'post_type' => 'courses', 'posts_per_page' => -1 );
					$courses = new WP_Query($args);
					if ( $courses->have_posts() ) : while ( $courses->have_posts() ) : $courses->the_post();
				?>

				<tr>
					<td class="centered list-col-3"><?php
						if ( get_field('imo_no') ) {
							echo get_field('imo_no');
						} else {
							echo '* * *';
						}
					?></td>
					<td class="list-col-1">
						<?php if ( current_user_can( 'edit_pages' ) ) : ?>
							<a href="<?php echo the_permalink(); ?>">
								<?php the_title('', ''); ?>
							</a>
						<?php else : ?>
							<?php the_title( '', '' ); ?>
						<?php endif; ?>
					</td>
					<td class="centered list-col-2"><?php the_field('abbr'); ?></td>
					<td class="centered"><?php the_field('duration'); ?></td>
					<td class="centered"><?php the_field('duration_hours'); ?></td>
					<td class="centered"><?php the_field('total_certificates'); ?></td>
					<td class="centered edit">
						<a href="<?php echo the_permalink(); ?>/" class="edit-form"><?php echo $edit; ?></a>
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
