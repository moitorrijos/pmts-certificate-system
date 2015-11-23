<div class="the-test">
	<h1>Test Resutls for <?php echo get_the_title($course->ID); ?></h1>

	<div class="half">
		<p>
			Participant's Name:
			<span class="undies"><?php echo the_field('name'); ?></span>
		</p>
		<p class="short">
			Participant's ID/Passport No.:
			<span class="undies"><?php echo the_field('passport_id'); ?></span>
		</p>
	</div>

	<div class="half">
		<p>
			Participant's Place of Birth:
			<span class="undies"><?php echo the_field('place_of_birth'); ?></span>
		</p>
		<p>
			Participant's Date of Birth:
			<span class="undies"><?php echo the_field('date_of_birth'); ?></span>	
		</p>
	</div>

</div>