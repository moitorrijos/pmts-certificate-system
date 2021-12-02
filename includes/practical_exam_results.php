<?php

function practical_exam_results( $course_obj ){

	?>

	<div class="required-documents">
		<h4>Practical Exam is based on the Criteria for Evaluating Competence (Column 4) of the STCW Code as amended.</h4>
	</div>

	<div class="exam-answers">
		<h3 class="short-short">Resultados de Examen Práctico/ <small>Practical Exam Results</small></h3>
	</div>
	<table class="practical-eval">
		<thead>
			<tr>
				<th class="no">
					No.
				</th>
				<th class="description">
					Performance Standard
				</th>
				<th class="description">
					Performance Criteria
				</th>
				<th class="done">
					Done<br>&#10003;
				</th>
				<th class="done">
					Not Done<br>X
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$practical_exam_results = get_post_meta($course_obj->ID, 'practical_exam_results', true);
				for ($i=0; $i < $practical_exam_results; $i++) :
			?>
				<tr>
					<td><?php echo $i+1; ?></td>
					<td><?php echo get_post_meta($course_obj->ID, 'practical_exam_results_' . $i . '_performance_standard', true); ?></td>
					<td><?php echo get_post_meta($course_obj->ID, 'practical_exam_results_' . $i . '_performance_criteria', true); ?></td>
					<td></td><td></td>
				</tr>
			<?php endfor; ?>
				<tr>
					<td colspan="3" class="right-align">
						<strong>Total Score</strong>
					</td>
					<td colspan="2"></td>
				</tr>
		</tbody>
	</table>

	<?php
}