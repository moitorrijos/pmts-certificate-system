<div class="main">

	<div class="main-content">

		<?php

		if( have_posts() ) : while( have_posts() ) : the_post();
		the_title('<h1>', '</h1>'); endwhile;
		endif; wp_reset_query();

		?>

		<div class="back-create-buttons">

			<div class="back-button-link buttons">
				
				<a href="<?php echo home_url('panama-certificates'); ?>" class="back-link">
					&laquo;

					Back to Certificates List

				</a>
			</div>

			<?php get_template_part('templates/buttons-div'); ?>
			
		</div>

		<?php

		get_template_part('templates/search_quotation_form');

		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

		$args = array( 
			'post_type' => 'quotation', 
			'posts_per_page' => 75,
			'paged' => $paged,
		);
		
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
					<th class="number">Service</th>
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
					<td class="centered list-col-3"><?php echo get_the_title(); ?></td>
					<td class="centered">
						<?php the_field('participants_phone_number'); ?>	
					</td>
					<td class="centered"><?php echo get_the_author(); ?></td>
					<td class="centered list-col-4"><?php echo get_the_date(); ?></td>
					<td class="centered edit">
						<a href="<?php echo the_permalink(); ?>/" class="edit-form"><?php echo $edit; ?></a>
					</td>
				</tr>

				<?php endwhile; ?>

			</tbody>

		</table>

		<?php if ($quotes->max_num_pages > 1) : ?>
			<div class="paginate">
				<p>Page:</p>
				<ul class="pagination">
					<li><?php echo get_next_posts_link( 'Older Quotes', $quotes->max_num_pages ); ?></li>
					<li><?php echo get_previous_posts_link( 'Newer Quotes' ); ?></li>
				</ul>
			</div>
		<?php endif; ?>

		<?php else : ?>

		<p>There are no quotes created yet. To create a new quote 

		<a href="<?php echo home_url( 'panama-quotations/new-panama-quotation' ); ?>">click here</a>.

		</p>

		<?php endif; ?>


	</div>

</div>