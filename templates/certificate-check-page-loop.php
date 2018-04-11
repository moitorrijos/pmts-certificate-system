<div class="main check">
	<div class="main-content">
		<?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post();
			the_title( '<h1>', '</h1>', true );
			endwhile; endif; 
		?>
		<p>
			Type the Register Code as it appears in the Certificate to verify the certificate authenticity.
		</p>
		<form id="search-certificate-check-number-form" class="search-by-id-no check-certificate">
			<div class="check-certificate">
				<div class="input">
					<span class="error-message">Sorry there was a problem, please try again.</span>
					<input class="search search_by_id_passport" type="search" placeholder="Type Register Code Here" id="search-certificate-check-number"/>
				</div>
				<div class="submit-btn">
					<button type="submit" class="check-certificate-button">Search Certificate</button>
					<span class="search-spinner"></span>
				</div>
			</div>
		</form>
	</div>
</div>