<div class="main">
	
	<div class="main-content">
		
		<?php 

			if ( have_posts() ) : while ( have_posts() ) : the_post(); 
			the_title('<h1>', '</h1>'); endwhile; endif; wp_reset_query();

		?>

		<div class="back-create-buttons">
			
			<div class="back-button-link buttons">
				
				<a href="<?php echo home_url( 'panama-invoices' ); ?>" class="back-link">
					&laquo;

					Back to Invoices Page

				</a>

			</div>

			<?php get_template_part( 'templates/buttons-div' ); ?>

		</div>

	</div>

</div>