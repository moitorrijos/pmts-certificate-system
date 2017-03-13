<?php

function student_info_short_table( $participants_name, $participants_id, $place_of_training, $end_date ){
	?>

		<table class="student-info">
		
			<tr>
				<td class="title">
					<p>Nombre del participante:</p>
					Name of the Participant:
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
					<p>Lugar del Curso:</p>
					Place of the Course:
				</td>
				<td>
					<p><?php echo $place_of_training->name; ?></p>
				</td>
				<td>
					<p>Fecha del Examen:</p>
					Date of Exam
				</td>
				<td>
					<p><?php echo $end_date->format('d/m/Y') ?></p>	
				</td>
			</tr>

		</table>

	<?php
}