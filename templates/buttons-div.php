<?php 

class AddButton {

	public function button_value() {
		if ( is_page_template( 'courses-page.php' ) ) {
	
			$add_value = 'Add Course';
			return $add_value;
			
		} elseif ( is_page_template( 'instructors-page.php' ) ) {
	
			$add_value = 'Add Instructor';
			return $add_value;
	
		} elseif ( is_page_template( 'panama-certificate-page.php' ) ) {
	
			$add_value = 'Create New Certificate';
			return $add_value;
	
		} elseif ( is_page_template( 'offices-page.php' ) ) {

			$add_value = 'Add Office';
			return $add_value;

		} elseif ( is_page_template( 'panama-quotation-page.php' ) ) {

			$add_value = 'Add Quotations';
			return $add_value;

		} elseif ( is_page_template( 'panama-reports-page.php' ) ) {

			$add_value = 'Create New Report';
			return $add_value;

		} 

	}

	public function button_link() {
		if ( is_page_template( 'courses-page.php' ) ) {
	
			$add_link = '#0';
			return $add_link;
			
		} elseif ( is_page_template( 'instructors-page.php' ) ) {
	
			$add_link = '/instructors-list/new-panama-instructor/';
			return $add_link;
	
		} elseif ( is_page_template( 'panama-certificate-page.php' ) ) {
	
			$add_link = '/panama-certificates/new-panama-certificate/';
			return $add_link;
	
		} elseif ( is_page_template( 'offices-page.php' ) ) {

			$add_link = '#0';
			return $add_link;

		} elseif ( is_page_template( 'panama-quotation-page.php' ) ) {

			$add_link = '/panama-quotations/new-panama-quotation/';
			return $add_link;
			
		} elseif ( is_page_template( 'panama-reports-page.php' ) ) {

			$add_link = '/panama-reports/new-panama-reports/';
			return $add_link;
			
		} 
	}

	public function is_deactivated() {
		if ( is_page_template( 'courses-page.php' ) ) {
	
			$deactivated = 'deactivated';
			return $deactivated;
			
		} elseif ( is_page_template( 'instructors-page.php' ) ) {
	
			$deactivated = '';
			return $deactivated;
	
		} elseif ( is_page_template( 'panama-certificate-page.php' ) ) {
	
			$deactivated = '';
			return $deactivated;
	
		} elseif ( is_page_template( 'offices-page.php' ) ) {
			$deactivated = 'deactivated';
			return $deactivated;
		}
	}
} 

$add_button = new AddButton;

?>

<div class="buttons align-right">
	<a href="#0" class="download-xls-button not-link"><i class="fa fa-download"></i>&nbsp; Download Table to Excel</a>

	<?php //if ( is_page_template( 'panama-certificate-page.php' ) ) : ?>

		<!-- <a href="#0" class="change-office-button not-link">
			<i class="fa fa-building"></i>&nbsp; Filter Certificates
		</a>  -->

		<!-- <a href="#0" class="search-id-no-button not-link">

			<i class="fa fa-search" aria-hidden="true"></i>&nbsp;
			Search Certificate

		</a> -->

	<?php //endif; ?>
	
	<?php if ( current_user_can('edit_pages') ) : ?>

		<a href="<?php echo $add_button->button_link(); ?>" class="new-certificate-button not-link">
			<i class="fa fa-plus-square"></i>&nbsp; <?php echo $add_button->button_value(); ?>
		</a>

	<?php endif; ?>
</div>