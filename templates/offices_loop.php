<div class="main">

	<div class="main-content" id="search-list">
		
		<?php

		if( have_posts() ) : while( have_posts() ) : the_post();
		the_title('<h1>', '</h1>'); endwhile;
		endif; wp_reset_query();

		?>

		<?php
			get_template_part('templates/buttons-div');
		 ?>

		<table class="download-xls-table">
			<thead>
				<tr>
					<th class="middle-title">Office</th>
					<th class="number">Office Number</th>
					<th class="title">Instructors</th>
				</tr>
			</thead>
			<tbody class="list">
					
				<?php 
					$args = array( 'post_type' => 'office', 'posts_per_page' => -1 );
					$office = new WP_Query($args);
					if ( $office->have_posts() ) : while ( $office->have_posts() ) : $office->the_post();

				?>

				<tr>
					<td class="centered list-col-1"><a href="<?php echo the_permalink(); ?>"><?php the_title('', ''); ?></a></td>
					<td class="centered list-col-2"><?php the_field('number'); ?></td>
					<td class="list-col-3">
						<?php
							$instructors = get_field('instructors');
							if ( $instructors ) { 
								foreach ( $instructors as $instructor ) {
									echo get_the_title($instructor->ID) . ' · ';
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
				</tr>

				<?php endif; ?>
			</tbody>
		</table>

	</div>

</div>