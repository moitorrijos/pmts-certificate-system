<div class="main">
	
	<div class="main-content">
		
		<div class="buttons">
			
			<a href="<?php echo home_url('panama-reports'); ?>">
				&laquo;

				Back to Rerpots List

			</a>

			<?php if ( current_user_can( 'edit_pages' ) ) : ?>

				<a href="#0" class="edit-button not-link"><i class="fa fa-pencil"></i>
						
						Edit Report


				</a>

			<?php endif; ?>

			<a href="#0" class="print-button not-link"><i class="fa fa-print"></i>

				Print Report

			</a>

			<a href="#0" class="view-button not-link"><i class="fa fa-eye"></i>

				View Report

			</a>

			<a href="<?php echo home_url('panama-reports/new-panama-reports');?>" class="new-certificate-button">

				Create New Report
				
			</a>

		</div>

		<?php 

			if ( have_posts() ) : while ( have_posts() ) : the_post();

			$course = get_field('name_of_the_course');
			$instructor = get_field('name_of_the_instructor');
			$course_date = DateTime::createFromFormat( 'Ymd', get_field('date_of_the_course') );
			$office = get_field('office_course_taken');

		 ?>

		 <div class="report">

		 	<h1 class="report-title">
		 		
		 		Informe Mensual de Certificados Emitidos

		 	</h1>

		 	<div class="full">
		 		
			 	<p class="short">
			 		
			 		Centro de Formación Marítima: <span class="undies uppers">Panama Maritime Training Services, Inc.</span>

			 	</p>
		 		
		 	</div>

		 	<div class="full">

				<div class="half">
					
				 	<p class="short issued-certificates">
				 		
				 		Cantidad de Certificados Emitidos: <span class="undies" id="issued-certificates-amount"></span>

				 	</p>
					
				</div>		 		
		 		
		 		<div class="half">
		 			
					<p class="short">
						
						Mes: <span class="undies"><?php echo $course_date->format('F') ?></span>

					</p>
		 			
		 		</div>
		 		
		 	</div>

		 	<div class="full">

		 		<div class="half">
		 			
		 			<p class="short">
		 				
		 				Nombre del Curso: <span class="undies"><?php echo $course->post_title . ' ' . '(' . $course->abbr . ')'; ?></span>

		 			</p>

		 		</div>

		 		<div class="half">
		 			
		 			<p class="short">
		 				
		 				Nombre del Instructor:

		 				<span class="undies">
		 					
		 					<?php echo $instructor->post_title; ?>

		 				</span>

		 			</p>

		 		</div>

	 		</div>


	 		<div class="full">

	 			<div class="half">
	 				
	 				<p class="short">
	 					
	 					Fecha del Curso: 

	 					<span class="undies">
	 						
	 						<?php echo $course_date->format('d F, Y') ?>

	 					</span>

	 				</p>
	 				
	 			</div>
	 			

	 			<div class="half">
	 				
	 				<p class="short">
	 					
	 					Lugar donde se dictó el curso:

	 					<span class="undies">
	 						
	 						<?php echo $office->name; ?>

	 					</span>

	 				</p>

	 			</div>

	 		</div>

			<?php endwhile; endif; wp_reset_query(); ?>

			<?php 

				//var_dump($course_date->format('Ymd')); die();

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
							'value'	=> $course_date->format('Ymd'),
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

		</div>

		<?php 

			if ( have_posts() ) : while ( have_posts() ) : the_post() ;

		?>

		<?php if ( current_user_can('edit_pages') ) : ?>

		<div class="edit-report-form">
			
			<?php 
					
				$report_options = array(
					'updated_message' => __("Report Updated", 'certificate-system'),
				);

				acf_form($report_options);

			?>

		</div>

		<?php endif; ?>

	<?php endwhile; endif; wp_reset_query(); ?>

</div>