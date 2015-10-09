<div class="main">

	<div class="main-content">
		
		<?php

		if( have_posts() ) : while( have_posts() ) : the_post();

		the_title('<h1>', '</h1>'); the_content(); endwhile;
			
		endif;

		?>
		<div class="buttons align-right">
			<a href="#0" class="download-button"><i class="fa fa-download"></i>&nbsp; Download Excel</a>
			<a href="<?php echo home_url('new-panama-certificate'); ?>" class="new-certificate-button"><i class="fa fa-plus-square"></i>&nbsp; Create New Certificate</a>
		</div>

	</div>

</div>