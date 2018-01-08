<div class="main">
	
	<div class="main-content">

		<?php 
		
			$options = array(
				'id' 		=> '',
				'post_id' 	=> 'new_post',
				'new_post'	=> array(
					'post_type'		=> 'certificates',
					'post_status'	=> 'publish'
				),
				'submit_value' => __("Create Certificate", 'certificate-system'),
				'updated_message' => __("Certificate Created", 'certificate-system'),
				'return' => '%post_url%',
			);

			acf_form( $options );

		?>

	</div>

</div>