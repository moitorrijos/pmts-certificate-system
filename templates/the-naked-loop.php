<div class="main">

	<div class="main-content">

		<?php if( have_posts() ) : while( have_posts() ) : the_post();

		the_title('<h1>', '</h1>'); the_content();

		endwhile; else :

		get_template_part('templates/the_message');

		endif;

		?>

	</div>

</div>