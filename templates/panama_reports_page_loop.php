<div class="main">
	
	<div class="main-content" id="search-list">
		
		<h1>Panama Reports</h1>

		<?php 

			get_template_part('templates/buttons-div');
			get_template_part('templates/search-bar');

			$reports_query_args = array(
				'post_type'		=> 'reports',
				'post_per_page' => -1,
			);

			$reports_query = new WP_Query( $reports_query_args )

			

		?>

	</div>

</div>