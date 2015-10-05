<?php if ( is_user_logged_in() ) {

	get_header(); 

	 echo '<div class="main-content">';

		if( have_posts() ) : while( have_posts() ) : the_post();

		the_title('<h1>', '</h1>'); the_content(); endwhile;
			
		endif;

	echo '</div>';

	get_footer();

} else {

	wp_redirect( home_url() );

	exit;
}