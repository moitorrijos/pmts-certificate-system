<div class="days-title">
	<h3 class="short-short">Puntuación Final del Examen Teórica y Práctica</h3>
	<h4>Theoretical and Practical Evaluation Final Score</h4>
</div>

<?php 
	$practical_exam_results = $args['practical_exam_results'];
	$start_date = $args['start_date'];
	$january_2022 = $args['january_2022'];
?>

<table class="evaluation-score">
	<thead>
		<tr>
			<th>Theoretical <br>Evaluation<br>
				<?php if ($start_date->getTimestamp() > $january_2022->getTimestamp()) : ?>
					<?php if ($practical_exam_results) echo '(40%)'; else echo '(100%)'; ?>
				<?php endif; ?>
			</th>
			<?php if ($practical_exam_results) : ?>
				<th>Practical <br>Evaluation <br>
					<?php if ($start_date->getTimestamp() > $january_2022->getTimestamp()) echo '(60%)'; ?>
				</th>
			<?php endif; ?>
			<th>Total Score <br>
				<?php if ($start_date->getTimestamp() > $january_2022->getTimestamp()) echo '(100%)'; ?>
			</th>
			<th>Observations</th>
		</tr>
	</thead>
	<tbody>
		<?php if ($practical_exam_results)  { 
			echo create_table_with(4, 1); }
			else { echo create_table_with(3, 1); }
		?>
	</tbody>
</table>
