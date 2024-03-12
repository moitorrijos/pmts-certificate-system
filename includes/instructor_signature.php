<?php

function instructor_signature( $instructor ) {
	$instructor_signature = get_field('instructor_digital_signature', $instructor->ID);
	?>
		<div class="general-director">
			<?php if ( $instructor_signature ) : ?>
				<img class="digital_signature" style="left: <?php echo rand(-10, 10); ?>px; bottom: <?php echo rand(25, 35);?>px; width: <?php echo rand(250, 350); ?>px" src="<?php echo $instructor_signature; ?>" alt="">
			<?php else : ?>
				<img class="digital_signature" style="left: <?php echo rand(-10, 10); ?>px; bottom: <?php echo rand(25, 35);?>px; width: <?php echo rand(200, 300); ?>px" src="<?php echo IMAGESPATH . "/firma-agustin-gonzalez66.svg"; ?>" alt="">
			<?php endif; ?>
			<div class="signature-line"></div>
			<p class="super-short">
			Academic Director's / Instructor's Signature
			</p>
		</div>
	<?php

}