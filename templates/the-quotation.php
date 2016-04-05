<div class="main">
	
	<div class="main-content">
		
		<div class="buttons">
			
			<a href="<?php echo home_url('panama-quotations'); ?>" class="back-link">
			&laquo;

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
						<th>Name</th>
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
					<?php if ( get_field('participants_phone_number') ) : ?>
						<tr>
							<td colspan="2">Phone: <?php the_field('participants_phone_number'); ?></td>
						</tr>
					<?php endif; ?>
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
						<th class="title">Service Details</th>
						<th class="short-number">Quantity</th>
						<th class="short-number">Unit Price</th>
						<th class="short-number">Price</th>
					</tr>
				</thead>
				<tbody>
				<?php while( have_rows('courses') ) : the_row(); 
					$course = get_sub_field('course_name');
					$quantity = get_sub_field('quantity');
					$is_panamanian = get_sub_field('panamanian');
					$is_renewal = get_sub_field('renewal');

					if ( get_sub_field('price') ) {
						$course_price = get_sub_field('price');
					} elseif ( $is_panamanian == "yes" && $is_renewal == "no" ) {
						$course_price = $course->price_panamanian;
					} elseif ( $is_panamanian == "no" && $is_renewal =="no" ) {
						$course_price = $course->price_foreign;
					} elseif ( $is_panamanian == "yes"  && $is_renewal == "yes" ) {
						$course_price = $course->price_panamanian_renewal;
					} elseif ( $is_panamanian == "no" && $is_renewal == "yes" ) {
						$course_price = $course->price_foreign_rewal;
					}
				?>
					<tr class="quote-tbody">
						<td>
							<?php if ($course->imo_no) : ?>
								Course IMO No. <?php echo $course->imo_no; ?>
							<?php endif; ?>
							<?php echo get_the_title($course->ID); ?>
							(<?php echo $course->abbr; ?>)
						</td>
						<td class="centered service-quantity" id="service-quantity">
							<?php echo $quantity ?>
						</td>
						<td class="centered">
							$<?php echo number_format(floatval($course_price), 2); ?>
						</td>
						<td class="centered course-price service-price-total" >
							$<?php echo number_format( ($course_price * $quantity), 2 ); ?>
						</td>
					</tr>
				<?php endwhile;
					while( have_rows('other_services') ) : the_row();
					$service_name = get_sub_field('service_name');
					$service_price = get_sub_field('service_price');
					$service_quantity = get_sub_field('service_quantity');
				 ?>
				 	<tr class="other-services">
				 		<td>
				 			<?php echo $service_name; ?>
				 		</td>
				 		<td class="centered service-quantity" id="service-quantity">
				 			<?php echo $service_quantity; ?>
				 		</td>
				 		<td class="centered service-price">
				 			$<?php echo number_format($service_price, 2); ?>
				 		</td>
				 		<td class="centered service-price-total">
				 			$<?php echo number_format(($service_quantity * $service_price), 2); ?>
				 		</td>
				 	</tr>
				 <?php endwhile; ?>

				</tbody>
				<tfoot>
					<?php if (get_field('discount')) : ?>
						<tr>
							<td colspan="3" class="total">Discount</td>
							<td id="discount" class="centered discount">
								<?php the_field('discount'); ?> %
							</td>
						</tr>
						<tr>
							<td colspan="3" class="total">Sub Total</td>
							<td id="subtotal" class="centered subtotal"></td>
						</tr>
					<?php endif; ?>
					<tr>
						<td colspan="3" class="total quote-footer">Government Fee</td>
						<td id="government-fee" class="centered government-fee"></td>
					</tr>
					<tr>
						<td colspan="3" class="total">Grand Total</td>
						<td id="total-price" class="centered total-price"></td>
					</tr>
				</tfoot>
			</table>

			<p class="bank-info">
				<strong>Note:</strong> Pay to Panama Maritime Training Services, Inc. <br>
				Checking Account (Cuenta Corriente) Banco General No. 03-29-01-025184-0,<br>
				Checking Account (Cuenta Corriente) Banco Banistmo No. 0101090844,<br>
				Clave, Visa, MasterCard in Office.
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