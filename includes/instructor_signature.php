<?php

function instructor_signature( $instructor ) {

	$instructor_signature = get_field('instructor_digital_signature', $instructor->ID);

	?>
		<div 
			class="general-director" 
			<?php if ( $instructor_signature ) : ?>
				style="background: url(<?php echo $instructor_signature; ?>) no-repeat; background-size: 240px 120px; background-position: center top;"
			<?php endif; ?>
		>
			<div class="signature-line"></div>
			<p class="super-short">
				Signature of General Director / Instructor
			</p>
		</div>
	<?php

}