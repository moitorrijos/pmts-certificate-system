<?php

function practical_exam_results( $course_obj, $start_date, $january_2022 ){

	?>

	<div class="required-documents">
		<?php if ($start_date->getTimestamp() > $january_2022->getTimestamp()) : ?>
			<h4>Practical Exam is based on the Criteria for Evaluating Competence (Column 4) of the STCW Code as amended.</h4>
		<?php else : ?>
			<ul>
				<li>
				<strong>The Exam must be taken in classroom and individually.</strong> / El Examen es tomado presencialmente e individualmente.
				</li>
				<li>
					<strong>The participant has up to 60 minutes to finish this test. After 60 minutes the Assessor can give you 10 extra minutes. Test must be carried out without assistance.</strong> El participante tiene hasta 60 minutos para terminar esta prueba. Después de 60 minutos el evaluador puede darle 10 minutos extra. La prueba debe realizarse sin ayuda.
				</li>
				<li>
				<strong>Must obtain more than 70% of the answers correctly to pass.</strong> Se debe obtener mas de 70% de las respuestas correctas para pasar.
				</li>
			</ul>
		<?php endif; ?>
	</div>

	<div class="exam-answers">
		<h3 class="short-short">Resultados de Examen Práctico/ <small>Practical Exam Results</small></h3>
	</div>
	<table class="practical-eval">
		<?php
			$observation_test_questions = get_post_meta( $course_obj->ID, 'observation_test', true);
			$practical_exam_results = get_post_meta($course_obj->ID, 'practical_exam_results', true);
		?>
		<thead>
			<?php if ($practical_exam_results && ($start_date->getTimestamp() > $january_2022->getTimestamp())) : ?>
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
			<?php else : ?>
				<tr>
					<th class="description">
						Descripción/ Description
					</th>
					<th>
						Yes<br>✓
					</th>
					<th>
						No<br>X
					</th>
					<th class="remarks">
						Observaciones/ Remarks
					</th>
				</tr>
			<?php endif; ?>
		</thead>
		<tbody>
			<?php if ($practical_exam_results && ($start_date->getTimestamp() > $january_2022->getTimestamp())): ?>
				<?php for ($i = 0; $i < $practical_exam_results; $i++) : ?>
					<tr>
						<td><?php echo $i+1; ?></td>
						<td><?php echo get_post_meta($course_obj->ID, 'practical_exam_results_' . $i . '_performance_standard', true); ?></td>
						<td><?php echo get_post_meta($course_obj->ID, 'practical_exam_results_' . $i . '_performance_criteria', true); ?></td>
						<td></td><td></td>
					</tr>
				<?php endfor; ?>
			<?php else : ?>
				<?php for ($i=0; $i < $observation_test_questions; $i++) : ?>
					<tr>
						<td><?php echo get_post_meta($course_obj->ID, 'observation_test_' . $i . '_practical_exam_question', true); ?></td>
						<td></td><td></td><td></td>
					</tr>
				<?php endfor; ?>
				<tr>
					<td colspan="3" class="right-align">
						<strong>Total Score</strong>
					</td>
					<td colspan="2"></td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>

	<?php
}