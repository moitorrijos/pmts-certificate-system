<?php

function pmtscs_header_for_print (
	$doc_code, 
	$revision_number,
	$course_obj, 
	$instructor_app, 
	$page_number,
	$total_page_number
	) {

	?>

	<div class="pmts-header">

		<?php get_template_part( 'templates/logo_svg' ); ?>

		<div class="name-of-course">
			<h1 class="short-short">Panama Maritime Training Services, Inc.</h1>
			<h3 class="short-short course-full-name">
				<?php 
					echo get_the_title( $course_obj->ID );
					if ( $course_obj->ID != 97 && $course_obj->ID != 81 ) {
						echo ' (' .  $course_obj->abbr . ')';
					}
					if ( $course_obj->imo_no ) {
						echo ' IMO ' . $course_obj->imo_no;
					}
				?>
			</h3>
			<h3 class="short-short">
				Intructor: <span class="undies"><?php echo $instructor_app->post_title; ?></span>
			</h3>
		</div>

		<div class="codes">
			
			<p class="super-short">
				Code: <?php echo $doc_code; ?>
			</p>
			<p class="super-short">
				Revision: <?php echo $revision_number; ?>
			</p>
			<p class="super-short">
				Date: 09/2021
			</p>
			<p class="super-short">
				Page <?php echo $page_number; ?> of 
				<?php echo $total_page_number; ?>
			</p>
			
		</div>

	</div>

	<?php

}