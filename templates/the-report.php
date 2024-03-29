<div class="main">
	
	<div class="main-content">
		
		<div class="buttons">
			
			<a href="<?php echo home_url('/panama-reports/end-of-classes-report/'); ?>">
				&laquo;

				Back to End of Classes Reports List

			</a>

			<a href="#0" class="edit-button not-link"><i class="fa fa-pencil"></i>

					Edit Report

			</a>

			<a href="#0" class="print-button not-link"><i class="fa fa-print"></i>

				Print Report

			</a>

			<a href="#0" class="view-button not-link"><i class="fa fa-eye"></i>

				View Report

			</a>

			<a href="#0" class="download-xls-button not-link"><i class="fa fa-download"></i>

				Download Report Excel

			</a>

			<a href="<?php echo home_url('panama-reports/new-panama-reports');?>" class="new-certificate-button">

				Create New Report
				
			</a>

		</div>

		<?php 

			if ( have_posts() ) : while ( have_posts() ) : the_post();
			
			setlocale(LC_ALL, 'es_ES');

			$course = get_field('name_of_the_course');
			$instructor = get_field('name_of_the_instructor');
			$date_of_the_course = get_field('date_of_the_course');
			$course_date_timestamp = strtotime( $date_of_the_course );
			$course_month = strftime( '%B', $course_date_timestamp );
			$course_date = strftime( '%e de %B de %G', $course_date_timestamp );
			$office = get_field('office_course_taken');

		 ?>

		 <div class="report">

		 	<div class="amp-logo-text">
		 		
		 		<div class="amp-logo">
		 			
		 			<img src="<?php echo IMAGESPATH; ?>/amp-logo.png" alt="Logo AMP">

		 		</div>

		 		<div class="amp-text">
		 			
		 			<h3>Autoridad Marítima de Panamá | <span class="smaller">Panama Maritime Authority</span></h3>

		 			<h4>Dirección General de Marina Mercante | <span class="smaller">General Directorate of Seafarers</span></h4>

		 		</div>

		 	</div>

			<div class="report-title-subtitle">
				
			 	<h1 class="report-title">
			 		
					 <!-- Informe Mensual de Certificados Emitidos -->
					 Informe de Finalización de Curso

			 	</h1>

			 	<h2 class="report-sub-title">
			 		
					<!-- Monthly Report of Issued Certificates -->
					End of Classes Report

			 	</h2>
				
			</div>

		 	<div class="report-full">

		 		<div class="report-undies-first">
		 			
				 	<p class="shorter">
				 		
				 		Centro de Formación Marítima:

				 	</p>

				 	<p class="shorter translation-text">
				 		
				 		Maritime Training Center

				 	</p>
		 			
		 		</div>

		 		<div class="report-undies">
		 			
		 			<span class="undies uppers">Panama Maritime Training Services, Inc.</span>

		 		</div>
		 		
		 	</div>

		 	<div class="full report-full">

				<div class="half full">

					<div class="report-text">
						
					 	<p class="shorter issued-certificates">
					 		
					 		Cantidad de Certificados Emitidos:

					 	</p>

						<p class="shorter translation-text">
				 		
					 		Number of Issued Certificates

					 	</p>

					</div>

					<div class="report-undies">
						
						<span class="undies" id="issued-certificates-amount">
							
							<?php 
								echo get_participant_number(
									$instructor->ID,
									$course->ID,
									$date_of_the_course
								);
							?>

						</span>

					</div>
					
				</div>
		 		
		 		<div class="half full">

		 			<div class="report-text">
		 				
						<p class="shorter">
							
							Mes:

						</p>

						<p class="shorter translation-text">
							
							Month

						</p>
		 				
		 			</div>

		 			<div class="report-undies">
		 				
		 				<span class="undies"><?php echo ucwords($course_month); ?></span>

		 			</div>
		 			
		 			
		 		</div>
		 		
		 	</div>

		 	<div class="full report-full">

		 		<div class="half full">

		 			<div class="report-text">
		 				
			 			<p class="shorter">
			 				
			 				Nombre del Curso: 

			 			</p>

			 			<p class="shorter translation-text">
			 				
			 				Name of Course:

			 			</p>
		 				
		 			</div>

					<div class="report-undies">
						
						<span class="undies">
							<?php echo $course->post_title . ' ' . '(' . $course->abbr . ')'; ?>
						</span>

					</div>

		 		</div>

		 		<div class="half full">

		 			<div class="report-text">
		 				
			 			<p class="shorter">
			 				
			 				Nombre del Instructor:

			 			</p>

			 			<p class="shorter translation-text">
			 				
			 				Name of the Instructor

			 			</p>
		 				
		 			</div>

		 			<div class="report-undies">
		 				
		 				<span class="undies">
			 					
		 					<?php echo $instructor->post_title; ?>

		 				</span>

		 			</div>

		 		</div>

	 		</div>


	 		<div class="full report-full">

	 			<div class="half full">

	 				<div class="report-text">
	 					
		 				<p class="shorter">
		 					
		 					Fecha del Curso: 

		 				</p>

		 				<p class="shorter translation-text">
		 					
		 					Date of the Course:

		 				</p>
	 					
	 				</div>

	 				<div class="report-undies">
	 					
	 					<span class="undies">
		 						
	 						<?php 

	 							// var_dump($date_of_the_course);

	 							echo pmtscs_report_dates($instructor, $course, $date_of_the_course);

	 						?>

	 					</span>

	 				</div>
	 				
	 			</div>

	 			<div class="half full">

	 				<div class="report-text">
	 					
		 				<p class="shorter">
		 					
		 					Lugar donde se dictó el curso:

		 				</p>

		 				<p class="shorter translation-text">
		 					
		 					Place where the course was imparted

		 				</p>
	 					
	 				</div>

	 				<div class="report-undies">
	 					
	 					<span class="undies">
		 						
	 						<?php echo $office->name; ?>

	 					</span>

	 				</div>
	 				
	 			</div>

	 		</div>

			<?php endwhile; endif; wp_reset_query(); ?>

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
							'key'		=> 'end_date',
							'value'	=> $date_of_the_course,
							'type'	=> 'numeric',
						)
					)
				);

				$report_certs = new WP_Query( $filter_certs_args );

				if ( $report_certs->have_posts() ) :

			 ?>

			<table class="system download-xls-table">
				
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
					<?php while ( $report_certs->have_posts() ) : $report_certs->the_post();
						
						$register_code =  get_post_meta(get_the_ID(), 'register_code', true);
						$issue_date = DateTime::createFromFormat( 'Ymd', get_field('date_of_issuance') );
						$issue_year = $issue_date->format('y');
						$start_date = DateTime::createFromFormat( 'Ymd', get_field('start_date') );
						$end_date = DateTime::createFromFormat( 'Ymd', get_field('end_date') );
						$the_course = get_field('course');

					?>

						<tr id="cert-number">
							<td class="centered">
								<?php echo $report_certs->current_post + 1; ?>
							</td>
							<td class="centered">
								<?php echo 'PMTS/' . $the_course->abbr . '/' . $issue_year . '-' . strtoupper($office->slug) . '-' . add_leading_zeroes($register_code) . $register_code; ?>
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

					<?php endwhile; else : ?>

					<p>No hay certificados para este curso en esta fecha.</p>

					<?php endif; wp_reset_query(); ?>

				</tbody>

			</table>

		</div>

		<?php 

			if ( have_posts() ) : while ( have_posts() ) : the_post() ;

		?>

		<div class="edit-report-form">
			
			<?php 
					
				$report_options = array(
					'updated_message' => __("Report Updated", 'certificate-system'),
				);

				acf_form($report_options);

			?>

		</div>

	<?php endwhile; endif; wp_reset_query(); ?>

</div>