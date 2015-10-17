<div class="main">

	<div class="main-content">
		
		<?php

		if( have_posts() ) : while( have_posts() ) : the_post();
		the_title('<h1>', '</h1>'); endwhile;
		endif; wp_reset_query();

		?>

		<table>
			<thead>
				<tr>
					<th class="title">Course Name</th>
					<th class="number">Course Abbreaviation</th>
					<th class="number">Course IMO Number</th>
					<th class="short-number">Duration</th>
					<th>Regulation</th>
				</tr>
			</thead>
			<tbody>
					
				<?php 
					$args = array( 'post_type' => 'courses', 'posts_per_page' => '100' );
					$courses = new WP_Query($args);
					if ( $courses->have_posts() ) : while ( $courses->have_posts() ) : $courses->the_post();
				?>

				<tr>
					<td><a href="<?php echo the_permalink(); ?>"><?php the_title('', ''); ?></a></td>
					<td class="centered"><?php the_field('abbr'); ?></td>
					<td class="centered"><?php the_field('imo_no'); ?></td>
					<td class="centered"><?php the_field('duration'); ?></td>
					<td><?php the_field('regulation'); ?></td>
				</tr>

				<?php endwhile; else : ?>

				<tr>
					<td> data +++ </td>
					<td> data +++ </td>
					<td> data +++ </td>
					<td> data +++ </td>
					<td> data +++ </td>
					<td> data +++ </td>
					<td> data +++ </td>
					<td> data +++ </td>
				</tr>

				<?php endif; ?>
			</tbody>
		</table>

	</div>

</div>