<tr>
	<td class="list-col-1">
		<a href="<?php echo the_permalink(); ?>">
			<?php the_field('participants_name'); ?>
		</a>
	</td>
	<td class="list-col-2">
		<?php the_field('clients_name'); ?>
	</td>
	<td class="centered list-col-3"><?php echo get_the_title(); ?></td>
	<td class="centered">
		<?php the_field('participants_phone_number'); ?>	
	</td>
	<td class="centered"><?php echo get_the_author(); ?></td>
	<td class="centered list-col-4"><?php echo get_the_date(); ?></td>
	<td class="centered edit">
		<a href="<?php echo the_permalink(); ?>/" class="edit-form"><?php echo $edit; ?></a>
	</td>
</tr>