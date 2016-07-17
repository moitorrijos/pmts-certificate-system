<div class="main">

	<div class="main-content" id="search-list">

		<?php

		if( have_posts() ) : while( have_posts() ) : the_post();
		the_title('<h1>', '</h1>'); endwhile;
		endif; wp_reset_query();

		get_template_part('templates/buttons-div');
		get_template_part('templates/search-bar' );

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args = array( 'post_type' => 'quotation', 'showposts' => 200, 'paged' => $paged );
		$edit = '<i class="fa fa-pencil-square-o"></i>';
		$quotes = new WP_Query($args);

		if ( $quotes->have_posts() ) :
			
		?>

		<table class="system download-xls-table">

			<thead>
				<tr>
					<th class="middle-title">Participant's Name</th>
					<th class="short-title">Client's Name</th>
					<th class="short-number">Quotation Number</th>
					<th class="short-number">Created By</th>
					<th class="number">Date</th>
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
					<td class="centered"><?php echo get_the_title(); ?></td>
					<td class="centered"><?php echo get_the_author(); ?></td>
					<td class="centered list-col-3"><?php echo get_the_date(); ?></td>
					<td class="centered edit">
						<a href="<?php echo the_permalink(); ?>/" class="edit-form"><?php echo $edit; ?></a>
					</td>
				</tr>

				<?php endwhile; ?>

			</tbody>

		</table>

		<?php if ( $quotes->max_num_pages > 1 ) : ?>
		
			<div class="paginate">
	    		<?php next_posts_link('&laquo; Older Quotes', $quotes->max_num_pages); ?>
				<?php previous_posts_link('Newer Quotes &raquo;') ?>
			</div>

		<?php endif; ?>

		<?php else : ?>

		<p>There are no quotes created yet. To create a new quote 

		<a href="<?php echo home_url( 'panama-quotations/new-panama-quotation' ); ?>">click here</a>.

		</p>

		<?php endif; ?>

	</div>

</div>