<div class="days-title">
	<h3 class="short-short">Puntuación Final del Examen Teórica y Práctica</h3>
	<h4>Theoretical and Practical Evaluation Final Score</h4>
</div>

<?php $observation_test = $args['observation_test']; ?>

<table class="evaluation-score">
	<thead>
		<tr>
			<th>Theoretical <br>Evaluation* <br>
				<?php if ($observation_test) echo '(40%)'; else echo '(100%)'; ?>
			</th>
			<?php if ($observation_test) : ?>
				<th>Practical <br>Evaluation <br>(60%)</th>
			<?php endif; ?>
			<th>Total Score <br>(100%)</th>
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
