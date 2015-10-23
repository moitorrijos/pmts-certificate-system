<?php 

class AddButton {

	function button_value() {
		if ( is_page_template( 'courses-page.php' ) ) {
	
			$add_value = 'Add Course';
			return $add_value;
			
		} elseif ( is_page_template( 'instructors-page.php' ) ) {
	
			$add_value = 'Add Instructor';
			return $add_value;
	
		} elseif ( is_page_template( 'panama-certificate-page.php' ) ) {
	
			$add_value = 'Create New Certificate';
			return $add_value;
	
		}
	}

	function button_link() {
		if ( is_page_template( 'courses-page.php' ) ) {
	
			$add_link = '#0';
			return $add_link;
			
		} elseif ( is_page_template( 'instructors-page.php' ) ) {
	
			$add_link = '#0';
			return $add_link;
	
		} elseif ( is_page_template( 'panama-certificate-page.php' ) ) {
	
			$add_link = 'panama-certificates/new-panama-certificate/';
			return $add_link;
	
		}
	}

	function is_deactivated() {
		if ( is_page_template( 'courses-page.php' ) ) {
	
			$deactivated = 'deactivated';
			return $deactivated;
			
		} elseif ( is_page_template( 'instructors-page.php' ) ) {
	
			$deactivated = 'deactivated';
			return $deactivated;
	
		} elseif ( is_page_template( 'panama-certificate-page.php' ) ) {
	
			$deactivated = '';
			return $deactivated;
	
		}
	}
} 

$add_button = new AddButton;



?>

<div class="buttons align-right">
	<a href="#0" class="download-xls-button"><i class="fa fa-download"></i>&nbsp; Download Table to Excel</a>
	
	<!-- <a href="#0" class="print-button"><i class="fa fa-print"></i>&nbsp; Print Table</a> -->

	<a href="<?php echo $add_button->button_link(); ?>" class="new-certificate-button <?php echo $add_button->is_deactivated(); ?>">
		<i class="fa fa-plus-square"></i>&nbsp; <?php echo $add_button->button_value(); ?>
	</a>
</div>