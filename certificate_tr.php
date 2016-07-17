<?php 

	while ( $certs->have_posts() ) : $certs->the_post();

	$edit = '<i class="fa fa-pencil-square-o"></i>';
	$course = get_field('course');
	$instructor = get_field('instructor');
	$office = get_field('office');
	$start_date = DateTime::createFromFormat( 'Ymd', get_field('start_date') );
	$end_date = DateTime::createFromFormat( 'Ymd', get_field('end_date') );
	$issue_date = DateTime::createFromFormat( 'Ymd', get_field('date_of_issuance') );
	$issue_month = $issue_date->format('m');
	$issue_year = $issue_date->format('y');
	$register_code =  get_post_meta(get_the_ID(), 'register_code', true);
	$post_date = get_the_date( date('d/m/y'), get_the_ID() );

	if ( $register_code > 9999 ) {

		$leading_zero = '';

	} elseif ( $register_code > 999 && $register_code <= 9999 ) {

		$leading_zero = '0';

	} elseif ( $register_code > 99 && $register_code <= 999 ) {

		$leading_zero = '00';

	} elseif ( $register_code > 9 && $register_code <= 99 ) {

		$leading_zero = '000';

	} else {

		$leading_zero = '0000';
	}

 ?>

<tr>
	<td>
		<a href="<?php echo the_permalink(); ?>">
			<?php echo the_field('students_name'); ?>
		</a>
	</td>
	<td class="centered">
		<?php echo the_field('passport_id'); ?>
	</td>
	<td class="centered">
		<?php echo $course->abbr; ?>
	</td>
	<td class="centered">
		<?php echo $start_date->format('d/m/y'); ?>
	</td>
	<td class="centered">
		<?php echo $end_date->format('d/m/y'); ?>
	</td>
	<td class="centered">
		<?php echo get_the_title($instructor->ID); ?>
	</td>
	<td class="centered">
		<?php echo $issue_date->format('d/m/y'); ?>
	</td>
	<td class="centered">
		<?php echo 'PMTS/' . $course->abbr . '/' . $issue_year . '-01-' . $leading_zero . $register_code; ?>
	</td>

	<?php if ( current_user_can('edit_pages') ) : ?>
		<td class="centered edit">
			<a href="<?php echo the_permalink(); ?>/#acf-form" class="edit-form"><?php echo $edit; ?></a>
		</td>
	<?php endif; ?>

</tr>

<?php endwhile; ?> 