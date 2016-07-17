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
	$studentNationality = $('input#acf-field_5728ffb5d7616'),
	$startDateInput = $('input#acf-field_56130060acfc8'),
	$endDateInput = $('input#acf-field_56130098acfc9'),
	$dateOfIssuance = $('input#acf-field_5619b16e70c02'),
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

				var studentsName, passportId, placeOfBirth, nationality, dateOfBirth, startDate, endDate;

				response.data.student_info.forEach(function(element){

					if (element.meta_key === 'students_name') {

						studentsName = element.meta_value;

					} else if ( element.meta_key === 'passport_id') {

						passportId = element.meta_value;

					} else if ( element.meta_key  === 'place_of_birth') {

						placeOfBirth = element.meta_value;

					} else if ( element.meta_key === 'student_nationality' ) {

						nationality = element.meta_value;

					} else if ( element.meta_key === 'date_of_birth' ) {

						dateOfBirth = element.meta_value;

					} else if ( element.meta_key === 'start_date' ) {

						startDate = element.meta_value;

					} else if ( element.meta_key === 'end_date' ) {

						endDate = element.meta_value;

					}
				});

				$studentPassportNoField.val( response.data.passport_no );

				$studentNameField.val( studentsName );

				$studentPlaceOfBirth.val( placeOfBirth  );

				$studentNationality.val( nationality );

				$studentDateOfBirth.val( dateOfBirth );

				$studentDateOfBirth.next('input').val( moment( dateOfBirth ).format('MMMM D, YYYY') );

				$startDateInput.val( startDate );

				$startDateInput.next('input').val( moment( startDate ).format('MMMM D, YYYY') );

				$endDateInput.val( endDate );

				$endDateInput.next('input').val( moment( endDate ).format('MMMM D, YYYY') );

				$dateOfIssuance.val( endDate );
				
				$dateOfIssuance.next('input').val( moment( endDate ).format('MMMM D, YYYY') );

			} else {

				$errorMessage.slideDown('fast');
				$searchSpinner.hide();
				$searchByIdSubmit.val('Try Again');

			}

		},

		error : function() {
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