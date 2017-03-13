<?php

function pmtscs_button_value() {
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

	} elseif ( is_page_template( 'application-form-page.php' ) ) {

		$add_value = 'Create New Application';
		return $add_value;

	} elseif ( is_page_template( 'panama-invoice-page.php' ) ) {

		$add_value = 'Create New Quotation';
		return $add_value;

	}

}

function pmtscs_button_link() {
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
		
	} elseif ( is_page_template( 'application-form-page.php' ) ) {

		$add_link = '/application-forms/new-application-form/';
		return $add_link;
		
	} elseif ( is_page_template( 'panama-invoice-page.php' ) ) {

		$add_link = '/panama-quotations/new-panama-quotation/';
		return $add_link;
		
	} 
}

?>

<div class="buttons align-right">

	<a href="#0" class="download-xls-button not-link"><i class="fa fa-download"></i>&nbsp; Download Table to Excel</a>

	<?php if( current_user_can('edit_pages') || is_page_template( 'panama-quotation-page.php' ) ) : ?>

	<a href="<?php echo pmtscs_button_link(); ?>" class="new-certificate-button not-link">
		<i class="fa fa-plus-square"></i>&nbsp; <?php echo pmtscs_button_value(); ?>
	</a>

	<?php endif; ?>

</div>