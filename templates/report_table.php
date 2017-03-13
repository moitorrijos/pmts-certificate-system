<?php 

	$filter_certs_args = array(

		'post_type'		=> 'certificates',
		'posts_per_page'	=> -1,
		'meta_key' 			=> 'register_code',
		'orderby'			=> 'meta_value_num',
		'order'				=> 'ASC',
		'meta_query'		=> array(
			array(
				'key'     => 'instructor',
				'value'   => (int) $instructor->ID,
			),
			array(
				'key'     => 'course',
				'value'   => (int) $course->ID,
			),
			array(
				'key'	=> 'date_of_issuance',
				'value'	=> get_field('date_of_the_course'),
				'type'	=> 'numeric',
			)
		)
	);

	$report_certs = new WP_Query( $filter_certs_args );

	if ( $report_certs->have_posts() ) :

 ?>

<table class="system">
	
	<thead>
		<tr>
			<th class="short-short-number">No.</th>
			<th class="middle-title">No. de Certificado</th>
			<th class="middle-title">Nombre del Participante</th>
			<th class="short-title">Nacionalidad</th>
			<th class="short-title">No. de Pasaporte o Identificación Personal</th>
		</tr>
	</thead>
	<tbody>
		<?php while ( $report_certs->have_posts() ) : $report_certs->the_post(); ?>

			<tr id="cert-number">
				<td class="centered">
					<?php echo $report_certs->current_post + 1; ?>
				</td>
				<td class="centered">
					<?php echo get_post_meta( get_the_id(), 'pmtscs_register_code', true ); ?>
				</td>
				<td class="centered">
					<?php echo the_field('students_name'); ?>
				</td>
				<td class="centered">
					<?php echo the_field('student_nationality'); ?>
				</td>
				<td class="centered">
					<?php echo the_field('passport_id'); ?>
				</td>
			</tr>

		<?php endwhile; endif; wp_reset_query(); ?>

	</tbody>

</table>