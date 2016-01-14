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
					<th class="number">Course IMO Number</th>
					<th class="title">Course Name</th>
					<th class="number">Course Abbreaviation</th>
					<th class="short-number">Duration in days</th>
					<th class="short-number">Duration in hours</th>
					<th>Regulation</th>
				</tr>
			</thead>

			<tbody class="list">

				<?php
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
					<td class="list-col-1"><a href="<?php echo the_permalink(); ?>"><?php the_title('', ''); ?></a></td>
					<td class="centered list-col-2"><?php the_field('abbr'); ?></td>
					<td class="centered"><?php the_field('duration'); ?></td>
					<td class="centered"><?php the_field('duration_hours'); ?></td>
					<td><?php the_field('regulation'); ?></td>
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
