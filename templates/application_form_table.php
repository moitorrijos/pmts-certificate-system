<?php 

	$participants_name = get_field('participants_name_app');
	$participants_id = get_field('passport_id_app');
	$participants_nationality = get_field('nationality_app');

 ?>

<tr>
	<td>
		<a href="<?php the_permalink(); ?>">
			<?php echo $participants_name; ?>
		</a>
	</td>
	<td class="centered">
		<?php echo $participants_id; ?>
	</td>
	<td class="centered">
		<?php echo $participants_nationality; ?>
	</td>
	<td class="centered">
		<a href="<?php echo the_permalink(); ?>">
			<?php echo the_title(); ?>
		</a>
	</td>
	<td class="centered">
		<?php the_author(); ?>
	</td>
	<td class="centered ">
		<?php 

			if ( have_rows('courses_app') ) : 

			while( have_rows('courses_app') ) : the_row(); 

			$courses = get_sub_field('course_name_app');
			
			$end_date = get_sub_field('end_date_app');

			$date_time = DateTime::createFromFormat('Ymd', $end_date);

			if ($end_date)
				$end_month = (int)$date_time->format('m');

			if (get_row_index() != 1) { echo ', '; }

			/**
			 * Check if certificate exists, if it doesnt exist check if is current 
			 * month or earlier then make red, else make orange-yellow.
			 */

			if ( !certificate_exists($participants_id, $courses) ) {

				if ( !$end_date ) {
					echo '<span class="print-pending-orange">' . $courses->abbr . '</span>';
				} elseif ( is_next_month($end_month) ) {
					echo '<span class="print-pending-yellow">' . $courses->abbr . '</span>';
				} else {
					echo '<span class="print-pending">' . $courses->abbr . '</span>';

				}

			} else {

				echo $courses->abbr;

			}

			endwhile; endif;

		?>
	</td>
	<?php if ( current_user_can( 'edit_pages' ) ) : ?>
		<td class="centered edit">
			<a href="<?php echo the_permalink(); ?>" class="edit-form">
				<i class="fa fa-pencil-square-o"></i>
			</a>
		</td>
	<?php endif; ?>
</tr>