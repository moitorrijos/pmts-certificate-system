; (function( $ ) {
$(function() {

var $searchByIdNoForm = $('#search-by-id-no'),
	$searchByIdSubmit = $('#search-by-id-submit'),
	$searchStudentForm = $('#search-student-form'),
	$searchByIdInput = $('input#search_by_id_passport'),
	$studentNameField = $('input#acf-field_5618388c2ff51'),
	$studentPassportNoField = $('input#acf-field_5612fe8fe2a39'),
	$studentPlaceOfBirth = $('input#acf-field_5612fef2fdc33'),
	$studentDateOfBirth = $('input#acf-field_5619ac69b2aab'),
	$errorMessage = $('.error-message'),
	$searchSpinner = $('span.search-spinner');

function ajaxSearchId( event ){

	event.preventDefault();
	$searchSpinner.show();

	if ( $searchByIdInput.val() === '' ) {
		$searchByIdInput
			.css('border', '1px solid #C10000')
			.addClass('animated shake');
		$searchSpinner.hide();
		return;
	}

	$searchByIdInput.removeClass('animated shake');

	$.ajax({
		url : pmtscs_ajax_object.ajaxurl,
		type : 'POST',
		dataType : 'json',
		data : {
			action : 'search_by_id_passport',
			security : pmtscs_ajax_object.security,
			passport_no : $searchByIdInput.val().toString()
		},

		success : function( response ) {
			if ( response.success ) {
				
				$searchSpinner.hide();
				$searchByIdSubmit.val('Done');
				$searchStudentForm.fadeOut('slow');


				var studentDateOfBirth = response.data.student_info[6].meta_value;

				$studentNameField.val( response.data.student_info[0].meta_value );
				$studentPassportNoField.val( response.data.passport_no );
				$studentPlaceOfBirth.val( response.data.student_info[4].meta_value  );
				$studentDateOfBirth.next('input').val( moment( studentDateOfBirth ).format('MMMM D, YYYY') );

			} else {

				this.error();
				$errorMessage.slideDown('fast');
				
			}

		},

		error : function( error ) {
			$searchByIdInput
				.addClass('animated shake');
			$searchSpinner.hide();
			return;
		}
	});
}

$searchByIdNoForm.on('submit', ajaxSearchId );

});
})(jQuery); 	