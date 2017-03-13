<?php

function student_info_complete_table( $participants_name, $participants_date_of_birth, $participants_id, $place_of_training, $participants_date_of_birth, $participants_rank, $start_date, $end_date ) {
	
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
					<p>Lugar de Nacimiento:</p>
						Place of Birth:
				</td>
				<td>
					<p>
						<?php echo $participants_date_of_birth->format('d/m/Y'); ?>
					</p>
				</td>
			</tr>
			<tr>
				<td>
					<p>Cédula o Pasaporte:</p>
					National ID or Passport No.:
				</td>
				<td>
					<p><?php echo $participants_id; ?></p>
				</td>
				<td>
					<p>Lugar del Curso:</p>
					Place of the Course:
				</td>
				<td>
					<p><?php echo $place_of_training->name; ?></p>
				</td>
			</tr>
			<tr>
				<td>
					<p>Fecha de Nacimiento:</p>
					Date of Birth:
				</td>
				<td>
					<p><?php echo $participants_date_of_birth->format('d/m/Y'); ?></p>
				</td>
				<td>
					<p>Rango:</p>
					Rank:
				</td>
				<td>
					<p><?php echo $participants_rank; ?></p>
				</td>
			</tr>
			<tr>
				<td>
					<p>Fecha de Inicio del Curso:</p>
					Start Date of Course:
				</td>
				<td>
					<p><?php echo $start_date->format('d/m/Y'); ?></p>
				</td>
				<td>
					<p>Fecha Final del Curso:</p>
					End Date of Course
				</td>
				<td>
					<p><?php echo $end_date->format('d/m/Y') ?></p>	
				</td>
			</tr>

		</table>

	<?php
}