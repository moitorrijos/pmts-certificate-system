<div class="main">

	<div class="main-content">
		
		<?php

		if( have_posts() ) : while( have_posts() ) : the_post();
		the_title('<h1>', '</h1>'); the_content(); endwhile;
		endif; wp_reset_query();

		?>

		<div class="buttons align-right">
			<a href="#0" class="download-button"><i class="fa fa-download"></i>&nbsp; Download Excel</a>
			<a href="<?php echo home_url('new-panama-certificate'); ?>" class="new-certificate-button"><i class="fa fa-plus-square"></i>&nbsp; Create New Certificate</a>
		</div>

		<table>
			<thead>
				<tr>
					<th class="name">Participant's Name</th>
					<th>Passport/ID No.</th>
					<th>Course taken</th>
					<th class="date">Start Date</th>
					<th class="date">End Date</th>
					<th class="instructor">Instructor</th>
					<th>Place of training</th>
					<th class="date">Date of Issue</th>
				</tr>
			</thead>
			<tbody>
					
				<?php 
					$args = array( 'post_type' => 'certificates', 'posts_per_page' => '25' );
					$certs = new WP_Query($args);
					if ( $certs->have_posts() ) : while ( $certs->have_posts() ) : $certs->the_post();
				?>

				<tr>
					<td><?php the_field('name'); ?></td>
					<td><?php the_field('passport_id'); ?></td>
					<td><?php the_field('course'); ?></td>
					<td><?php the_field('start_date'); ?></td>
					<td><?php the_field('end_date'); ?></td>
					<td><?php the_field('instructor'); ?></td>
					<td><?php the_field('place_of_training'); ?></td>
					<td><?php the_field('date_of_issuance'); ?></td>
				</tr>

				<?php endwhile; else : for ($i = 0; $i < 10; $i++) : ?>

				<tr>
					<td> data +++ </td>
					<td> data +++ </td>
					<td> data +++ </td>
					<td> data +++ </td>
					<td> data +++ </td>
					<td> data +++ </td>
					<td> data +++ </td>
					<td> data +++ </td>
				</tr>

				<?php endfor; endif; ?>
			</tbody>
		</table>

	</div>

</div>