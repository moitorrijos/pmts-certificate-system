<div class="days-title">
	<h3 class="short-short">Puntuación Final del Examen Teórica y Práctica</h3>
	<h4>Theoretical and Practical Evaluation Final Score</h4>
</div>

<?php 
	$observation_test = $args['observation_test'];
	$start_date = $args['start_date'];
	$january_2022 = $args['january_2022'];
?>

<table class="evaluation-score">
	<thead>
		<tr>
			<th>Theoretical <br>Evaluation<br>
				<?php if ($start_date->getTimestamp() > $january_2022->getTimestamp()) : ?>
					<?php if ($observation_test) echo '(40%)'; else echo '(100%)'; ?>
				<?php endif; ?>
			</th>
			<?php if ($observation_test) : ?>
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
		<?php if ($observation_test)  { 
			echo create_table_with(4, 1); }
			else { echo create_table_with(3, 1); }
		?>
	</tbody>
</table>
