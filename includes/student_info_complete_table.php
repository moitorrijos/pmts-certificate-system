<?php

function student_info_complete_table( 
	$participants_name, 
	$participants_date_of_birth, 
	$participants_id, 
	$place_of_training, 
	$participants_place_of_birth, 
	$participants_nationality, 
	$start_date, 
	$end_date ) {
	
	?>

		<table class="student-info">
		
			<tr>
				<td class="title">
					<p>Nombre del participante:</p>
					<small>Name of the Participant:</small>
				</td>
				<td>
					<p>
						<?php echo $participants_name; ?>		
					</p>
				</td>
				<td>
					<p>Cédula o Pasaporte:</p>
					National ID or Passport No.:
				</td>
				<td>
					<p><?php echo $participants_id; ?></p>
				</td>
			</tr>
			<tr>
				<td>
					<p>Fecha de Nacimiento:</p>
					Date of Birth (dd/mm/yyyy):
				</td>
				<td>
					<p><?php echo $participants_date_of_birth->format('d/m/Y'); ?></p>
				</td>
				<td>
					<p>Lugar de Nacimiento:</p>
						Place of Birth:
				</td>
				<td>
					<p>
						<?php echo $participants_place_of_birth; ?>
					</p>
				</td>
			</tr>
			<tr>
				<td>
					<p>Lugar del Curso:</p>
					Place of the Course:
				</td>
				<td>
					<p><?php echo $place_of_training->name; ?></p>
				</td>
				<td>
					<p>Nacionalidad:</p>
					Nationality:
				</td>
				<td>
					<p><?php echo $participants_nationality; ?></p>
				</td>
			</tr>
			<tr>
				<td>
					<p>Fecha de Inicio del Curso:</p>
					Start Date of Course (dd/mm/yyyy):
				</td>
				<td>
					<p><?php echo $start_date->format('d/m/Y'); ?></p>
				</td>
				<td>
					<p>Fecha Final del Curso:</p>
					End Date of Course (dd/mm/yyyy):
				</td>
				<td>
					<p><?php echo $end_date->format('d/m/Y') ?></p>	
				</td>
			</tr>

		</table>

	<?php
}