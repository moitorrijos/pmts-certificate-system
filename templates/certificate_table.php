<?php 

	$edit = '<i class="fa fa-pencil-square-o"></i>';
	$course = get_field('course');
	$instructor = get_field('instructor');
	$office = get_field('office');
	$start_date = DateTime::createFromFormat( 'Ymd', get_field('start_date') );
	$end_date = DateTime::createFromFormat( 'Ymd', get_field('end_date') );
	$issue_date = DateTime::createFromFormat( 'Ymd', get_field('date_of_issuance') );
	$issue_month = $issue_date->format('m');
	$issue_year = $issue_date->format('y');
	$post_date = get_the_date( date('d/m/y'), get_the_ID() );
	$register_code =  get_post_meta(get_the_ID(), 'register_code', true);

?>

	<tr>
		<td class="centered list-col-4">
			<?php echo 'PMTS/' . $course->abbr . '/' . $issue_year . '-' . $office->slug . '-' . add_leading_zeroes($register_code) . $register_code; ?>
		</td>
		<td class="list-col-1">
			<a href="<?php echo the_permalink(); ?>">
				<?php echo the_field('students_name'); ?>
			</a>
		</td>
		<td class="centered nationality">
			<?php echo the_field('student_nationality'); ?>
		</td>
		<td class="centered list-col-2">
			<?php echo the_field('passport_id'); ?>
		</td>
		<td class="centered abbr">
			<?php echo $course->abbr; ?>
		</td>
		<td class="centered">
			<?php echo $start_date->format('d/m/y'); ?>
		</td>
		<td class="centered">
			<?php echo $end_date->format('d/m/y'); ?>
		</td>
		<td class="centered list-col-3 instructor-name">
			<?php echo get_the_title($instructor->ID); ?>
		</td>
		<td class="centered">
			<?php echo $issue_date->format('d/m/y'); ?>
		</td>
		<td class="centered list-col-4">
			<?php echo $office->name; ?>
		</td>

		<?php if ( current_user_can('edit_pages') ) : ?>
			<td class="centered edit">
				<a href="<?php echo the_permalink(); ?>/#acf-form" class="edit-form"><?php echo $edit; ?></a>
			</td>
		<?php endif; ?>

	</tr>