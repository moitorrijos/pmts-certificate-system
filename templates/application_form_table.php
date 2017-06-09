<?php 

	$participants_name = get_field('participants_name_app');

	$participants_id = get_field('passport_id_app');

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

			$certificate_exists_app = get_posts(array(
				'post_type' => 'certificates',
				'meta_query' => array(
					'relation' => 'AND',
					array(
		            'key' => 'passport_id',
		            'value' => $participants_id,
		            'compare' => '=',
			        ),
			        array(
			            'key' => 'course',
			            'value' => (int)$courses->ID,
			            'compare' => '=',
			        ),
				),
			));

			if (get_row_index() != 1) { echo ', '; }

			if ( !$certificate_exists_app ) { 

				echo '<span class="print-pending">' . $courses->abbr . '</span>';

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