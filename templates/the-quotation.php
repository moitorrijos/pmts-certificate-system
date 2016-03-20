<div class="main">
	
	<div class="main-content">
		
		<div class="buttons">
			
			<a href="<?php echo home_url('panama-quotations'); ?>" class="back-link"><i class="fa fa-backward"></i>

			Back to Quotations Page

			</a>

			<?php if ( current_user_can( 'edit_pages' ) ) : ?>

				<a href="#0" class="edit-quote-button not-link"><i class="fa fa-pencil"></i>
					
					Edit Quote

				</a>

			<?php endif; ?>

			<a href="#0" class="print-button not-link"><i class="fa fa-print"></i>

				Print Quote

			</a>

			<a href="#0" class="view-button not-link"><i class="fa fa-eye"></i>

				View Quote

			</a>

			<a href="<?php echo home_url('panama-quotations/new-panama-quotation');?>" class="new-certificate-button">

				Create New Quotation
				
			</a>

		</div>

		<?php 

			if ( have_posts() ) : while ( have_posts() ) : the_post() ;


		?>

		<div class="quotation">

			<div class="quotation-logo">
				<h4 class="quote-number"><?php echo get_the_title(); ?></h4>
				<?php get_template_part('templates/logo_image'); ?>
				<div class="company-info">
					<h4>Panama Maritime Training Services, Inc.</h4>
					<p>Maritime Training Tailored to You</p>
					<p>77th Street, San Francisco</p>
					<p>InterMaritime Building</p>
					<p>&nbsp;</p>	
					<p>Local Phone: +(507) 395-2801 / +(507) 322-0013</p>
					<p>E-Mail: info@panamamaritimetraining.com</p>
					<p>Web: www.panamamaritimetraining.com</p>
				</div>
			</div>

			<div class="clearfix"></div>
			
			<table class="participant-info">
				<thead>
					<tr>
						<th>Name:</th>
						<?php if ( get_field('participants_email') ) : ?>
						<th>Email:</th>
						<?php endif; ?>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php the_field('participants_name'); ?></td>
						<?php if ( get_field('participants_email') ) : ?>
						<td><?php the_field('participants_email'); ?></td>
						<?php endif; ?>
					</tr>
				</tbody>
			</table>

			<?php if ( get_field('clients_email') ) : ?>

			<table class="referer-info">

				<thead>
					<tr>
						<th>Referer's Name</th>
						<?php if ( get_field('clients_email') ) : ?>
						<th>Referer's Email</th>
						<?php endif; ?>
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<td><?php (the_field('clients_name')); ?></td>
						<?php if (get_field('clients_email')) : ?>
						<td><?php (the_field('clients_email')); ?></td>
						<?php endif; ?>
					</tr>
				</tbody>
			</table>

			<div class="clearfix"></div>

			<?php endif; ?>
			
			<?php if ( have_rows('courses') ) : ?>

			<table>
				
				<thead>
					<tr>
						<th class="short-number">IMO No.</th>
						<th class="title">Course Name</th>
						<th class="short-number">Price</th>
					</tr>
				</thead>
				<tbody>
				<?php while( have_rows('courses') ) : the_row(); 
					$course = get_sub_field('course_name');
					$course_price = get_sub_field('price');
					// $is_renewal = get_sub_field('renewal');
					// $is_panamanian = get_sub_field('panamanian');
				?>
					<tr>
						<td class="align-right">
							<?php if ($course->imo_no) {
								echo $course->imo_no; 
							} else {
								echo '* * *';
							}
							?>
						</td>
						<td>
							<?php echo get_the_title($course->ID); ?>
							(<?php echo $course->abbr; ?>)
						</td>
						<td class="centered course-price">$<?php echo $course_price; ?>.00</td>
					</tr>
				<?php endwhile; ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="2" class="total quote-footer">Government Fee</td>
						<td id="government-fee" class="centered quote-footer"></td>
					</tr>
					<tr>
						<td colspan="2" class="total">Total</td>
						<td id="total-price" class="centered total-price"></td>
					</tr>
				</tfoot>
			</table>

			<p class="bank-info">
				<strong>Nota:</strong> Pago a Panama Maritime Training Services, Inc. <br>
				Cuenta Corriente Banco Banistmo No. 0101090844 <br>
				Cuenta Corriente Banco General No. 03-29-01-025184 <br>
				Clave, Visa, MasterCard en Local.
			</p>

			<?php endif; ?>

		</div>

		<?php if ( current_user_can('edit_pages') ) : ?>

		<div class="edit-quote-form">
			
			<?php 
					
				$quote_options = array(
					'updated_message' => __("Quote Updated", 'certificate-system'),
				);

				acf_form($quote_options);

			?>

		</div>

		<?php endif; ?>

		<?php endwhile; endif; ?>

	</div>


</div>