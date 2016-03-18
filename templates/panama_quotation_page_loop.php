<div class="main">

	<div class="main-content">

		<?php

		if( have_posts() ) : while( have_posts() ) : the_post();
		the_title('<h1>', '</h1>'); endwhile;
		endif; wp_reset_query();

		get_template_part('templates/buttons-div');

		$args = array( 'post_type' => 'quotation', 'posts_per_page' => 75 );
		$edit = '<i class="fa fa-pencil-square-o"></i>';
		$courses = new WP_Query($args);

		if ( $courses->have_posts() ) :
			
		?>

		<table class="download-xls-table">

			<thead>
				<tr>
					<th class="short-title">Participant's Name</th>
					<th class="short-number">Quotation Number</th>
					<th class="short-number">Edit</th>
				</tr>
			</thead>

			<tbody>
				
				<?php while ( $courses->have_posts() ) : $courses->the_post(); ?>
				
				<tr>
					<td>
						<a href="<?php echo the_permalink(); ?>">
							<?php the_field('participants_name'); ?>
						</a>
					</td>
					<td class="centered"><?php echo get_the_title(); ?></td>
					<td class="centered edit">
						<a href="<?php echo the_permalink(); ?>/" class="edit-form"><?php echo $edit; ?></a>
					</td>
				</tr>

				<?php endwhile; else : ?>

				<p>There are no quotes created yet. To create a new quote <a href="<?php echo home_url( 'panama-quotations/new-panama-quotation' ); ?>">click here</a>.</p>

				<?php endif; ?>

			</tbody>

		</table>

	</div>

</div>