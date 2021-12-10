<?php
	$start_date = $args['start_date'];
	$january_2022 = $args['january_2022'];
?>
<div class="required-documents">
	<h4 class="short-short">Exam Requirements / Requisitos para el Examen</h4>
	<ul>
		<li><strong>Circle the option with the best answer. Only (1) answer is correct.</strong> / Encierre en un círculo la opción de la mejor respuesta. Sólo (1) respuesta es correcta.</li>
		<li><strong>The Exam must be taken in classroom and individually.</strong> / El Examen es tomado presencialmente e individualmente.</li>
		<li><strong>The participant has up to 60 minutes to finish this test. After 60 minutes the Instructor can give you 10 extra minutes.</strong> / El participante tiene hasta 60 minutos para terminar esta prueba. Después de 60 minutos, el Instructor puede darle 10 minutos extra.</li>
		<li><strong>Test must be carried out without assistance.</strong> / Las respuestas deben ser contestadas sin asistencia.</li>
		<li><strong>The minimum percentage of approval for the Written Test is 70%.</strong> / Se debe obtener un mínimo de 70% de las respuestas correctas para aprobar.</li>
		<?php if ($start_date->getTimestamp() > $january_2022->getTimestamp()) : ?>
			<li><strong>For the case of Theoretical and Practical Course, the Rating Weight Percentage to evaluate is: Theoretical 40% and Practical 60%. If only Theoretical Course, the Rating Weight Percentage to evaluate is: Theoretical 100%.</strong> / Para el caso de Curso Teórico y Práctico, el Porcentaje de Ponderación de Calificación a evaluar es: Teórico 40% y Práctico 60%. Si solo es Curso Teórico, el Porcentaje de Ponderación de Calificación a evaluar es: Teórico 100%.</li>
			<li><strong>The Questions has a score of 5 points each. Maximum score to obtain 100 points.</strong> / Las Preguntas tienen una puntuación de 5 puntos c/u. Puntuación máxima a obtener 100 puntos.</li>
		<?php endif; ?>
	</ul>
</div>

<div class="exam-answers">
	<h3>Exam Results / Resultados de Examen</h3>
	<ol>
		<?php 
			for ($i=0; $i<20; $i++) {
				echo '<li>&nbsp;&nbsp;&nbsp;a&nbsp;&nbsp;&nbsp;&nbsp;b&nbsp;&nbsp;&nbsp;&nbsp;c&nbsp;&nbsp;&nbsp;&nbsp;d</li>';
			} 
		?>
	</ol>
</div>

<div class="exam-score">
	<h3>Exam Score / Puntaje del Examen: <span class="score">__________________</span></h3>
</div>
