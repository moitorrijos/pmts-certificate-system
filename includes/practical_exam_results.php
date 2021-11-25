<?php

function practical_exam_results( $course_obj ){

	?>

	<div class="required-documents">
		<!-- <ul>
			<li>
				El Examen es tomado presencialmente e individualmente./The Exam must be taken in classroom and individually.
			</li>
			<li>
				El participante tiene hasta 120 minutos para terminar esta prueba. Después de 120 minutos el evaluador puede darle 10 minutos extra. La prueba debe realizarse sin ayuda./The participant has up to 55 minutes to finish this test. After 120 minutes the Assessor can give you 10 extra minutes Test must be carried out without assistance.
			</li>
			<li>
				Se debe obtener mas de 70% de las respuestas correctas para pasar./Must obtain more than 70% of the answers correctly to pass.
			</li>
		</ul> -->
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
				$observation_test_questions = get_post_meta( $course_obj->ID, 'observation_test', true);
				for ($i=0; $i < $observation_test_questions; $i++) :
			?>
				<tr>
					<td><?php echo $i+1; ?></td>
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
		</tbody>
	</table>

	<?php
}