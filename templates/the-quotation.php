<div class="main">
	
	<div class="main-content">
		
		<?php 

			if ( have_posts() ) : while ( have_posts() ) : the_post() ;

		?>

		<div class="buttons">
			
			<a href="<?php echo get_permalink( 208 ); ?>" class="back-link">
			&laquo;

			Back to Quotations Page

			</a>

			<a href="#0" class="edit-quote-button not-link"><i class="fa fa-pencil"></i>
				
				Edit Quote

			</a>

			<a href="#0" class="print-button not-link">

				<i class="fa fa-print"></i>
				Print Quote

			</a>

			<a href="#0" class="view-button not-link">

				<i class="fa fa-eye"></i>
				View Quote

			</a>

			<a 	href="#0" 
				class="duplicate-certificate-button not-link" 
				data-post_id="<?php echo get_the_ID(); ?>"
			>

				<i class="fa fa-clone" aria-hidden="true"></i>
				Duplicate Quotation
				
			</a>

			<a href="<?php echo get_permalink( 222 );?>" class="new-certificate-button ">

				<i class="fa fa-plus-square" aria-hidden="true"></i>
				Create New Quotation
				
			</a>

			<a href="#0" class="approve-quotation" data-post_id="<?php echo get_the_id(); ?>">

				<i class="fa fa-check"></i> 
				Approve Quotation
				
			</a>

		</div>

		<div class="quotation">

			<div class="quotation-logo-table">
				<div class="quotation-logo">
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
				<div class="quote-info">
					<table class="system quote-info-table">
						<thead>
							<tr>
								<th>Invoice Number</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><h4 class="quote-number"><?php echo get_the_title(); ?></h4></td>
								<td><?php echo get_the_date(); ?></td>
							</tr>
							<!-- <tr>
								<td class="centered">In Valid for 45 days</td>
								<td class="centered">Prepared by: <?php //the_author(); ?></td>
							</tr> -->
						</tbody>
					</table>
				</div>
			</div>

			<div class="clearfix"></div>
			
			<table class="system participant-info">
				<thead>
					<tr>
						<th>Participant's Information</th>
						<?php if ( get_field('participants_email') ) : ?>
						<th>Email:</th>
						<?php endif; ?>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Name: <?php the_field('participants_name'); ?></td>
						<?php if ( get_field('participants_email') ) : ?>
						<td>
							<?php the_field('participants_email'); ?>
						</td>
						<?php endif; ?>
					</tr>
					<?php if ( get_field('participants_nationality') ) : ?>
						<tr>
							<td colspan="2" >Nationality: <?php the_field('participants_nationality'); ?></td>
						</tr>
					<?php endif; ?>
					<?php if ( get_field('participants_phone_number') ) : ?>
						<tr>
							<td colspan="2">Phone: <?php the_field('participants_phone_number'); ?></td>
						</tr>
					<?php endif; ?>
					<?php if ( get_field('type_of_service') ): ?>
						<tr>
							<td colspan="2">
								Service: <?php the_field('type_of_service') ?>
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>

			<?php if ( get_field('clients_name') ) : ?>

			<table class="system referer-info">

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
			
			<table class="system">
				
				<thead>
					<tr>
						<th class="short-number">No.</th>
						<th class="title">Service Details</th>
						<th class="short-number">Quantity</th>
						<th class="short-number">Unit Price</th>
						<th class="short-number">Price</th>
					</tr>
				</thead>
				<tbody>

				<?php if ( have_rows('courses') ) :
					while( have_rows('courses') ) : the_row(); 
					$course = get_sub_field('course_name');
					$sub_student = get_sub_field('sub_participants_name');
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
						<td class="numbers-col centered">

						</td>
						<td>
							<?php if ($course->imo_no) : ?>
								Course IMO No. <?php echo $course->imo_no; ?>
							<?php endif; ?>
							<?php echo get_the_title($course->ID); ?>
							<?php if ( $course->ID !== 81 && $course->ID !== 97 ) : ?>
								(<?php echo $course->abbr; ?>)
							<?php endif; ?>
							<?php if ($is_renewal == "yes"): ?>
								<b>Renewal</b>
							<?php endif; ?>
						</td>
						<td class="centered course-quantity" id="service-quantity">
							<?php echo $quantity ?>
						</td>
						<td class="centered">
							$<?php echo number_format( floatval($course_price), 2); ?>
						</td>
						<td class="centered course-price service-price-total" >
							$<?php echo number_format( ($course_price * $quantity), 2 ); ?>
						</td>
					</tr>
				<?php endwhile; endif;
					if ( have_rows('other_services') ) :
					while( have_rows('other_services') ) : the_row();
					$service_name = get_sub_field('service_name');
					$service_price = get_sub_field('service_price');
					$service_quantity = get_sub_field('service_quantity');
				 ?>
				 	<tr class="quote-tbody">
				 		<td class="numbers-col centered">

						</td>
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
				 			$<?php echo number_format( ($service_quantity * $service_price), 2); ?>
				 		</td>
				 	</tr>
				 <?php endwhile; endif; ?>

				</tbody>
				<tfoot>
					<tr>
						<td colspan="4" class="total">Sub Total</td>
						<td id="subtotal" class="centered subtotal-discount"></td>
					</tr>
					<?php if (get_field('discount')) : ?>
						<tr>
							<td colspan="4" class="total" >Discount <?php the_field('discount'); ?>%</td>
							<td id="discount" class="centered discount" data-discount="<?php the_field('discount'); ?>"></td>
						</tr>
						<tr>
							<td colspan="4" class="total">Sub Total with Discount</td>
							<td id="subtotal-discount" class="centered subtotal"></td>
						</tr>
					<?php endif; ?>
					<?php if ( have_rows('courses') ) : ?>
					<tr>
						<td colspan="4" class="total quote-footer" data-govfee="<?php the_field('government_fee'); ?>">
							Certificate Government Fee
						</td>
						<td id="government-fee" class="centered government-fee"></td>
					</tr>
					<?php endif; ?>
					<tr>
						<td colspan="4" class="total">Grand Total</td>
						<td id="total-price" class="centered total-price"></td>
					</tr>
				</tfoot>
			</table>
			
			<?php get_template_part( 'templates/bank_info' ); ?>

		</div>

		<div class="edit-quote-form">
			
			<?php 
					
				$quote_options = array(
					'updated_message' => __("Quote Updated", 'certificate-system'),
				);

				acf_form($quote_options);

			?>

		</div>

		<?php endwhile; endif; ?>

	</div>


</div>