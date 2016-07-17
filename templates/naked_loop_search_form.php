<div class="main">

	<div class="main-content">

		<?php if( have_posts() ) : while( have_posts() ) : the_post();

		the_title('<h1>', '</h1>'); the_content(); endwhile; else :

		get_template_part('templates/404_message');

		endif; wp_reset_query();

		?>

		<form action="#0" class="search-certificate">
			<input name="search_certificate" id="search_certificate" type="text" placeholder="SEARCH ID OR PASSPORT NO">
			<input type="submit" value="Search" id="search_certificate_submit">
			<span class="search-spinner"></span>
		</form>

	</div>

</div>