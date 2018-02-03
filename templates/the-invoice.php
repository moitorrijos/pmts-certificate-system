<div class="main">
	
	<div class="main-content">
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="invoice">
			
			<h1><?php the_title(); ?></h1>

			<p>Testing Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			
		</div>

		<?php endwhile; endif; ?>

	</div>

</div>