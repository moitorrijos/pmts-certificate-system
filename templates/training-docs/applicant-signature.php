<?php 
	$student_digital_signature = $args['student_digital_signature'];
?>
<div class="applicant-signature">
	<?php if ($student_digital_signature) : ?>
		<img class="digital_signature" style="left: <?php echo rand(-10, 10); ?>px; bottom: <?php echo rand(10, 20);?>px; width: <?php echo rand(80, 100); ?>%" src="<?php echo $student_digital_signature; ?>" alt="signature">
	<?php endif; ?>
	<div class="signature-line"></div>
	<p class="super-short">
		Firma de Participante
	</p>
	<p class="super-short">
		Participant's Signature
	</p>
</div>