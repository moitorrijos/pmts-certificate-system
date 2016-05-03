<div class="main">
	
	<div class="main-content">

		<?php if( have_posts() ) : while( have_posts() ) : the_post();

		the_title('<h1>', '</h1>'); the_content(); endwhile;

		endif; wp_reset_query();

		?>
		
		<div class="courses-calendar" id="courses-calendar"></div>
		
	</div>
	

</div>