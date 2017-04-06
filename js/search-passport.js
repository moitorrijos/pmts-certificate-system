var pmtscs_ajax_object, moment;

; (function( $ ) {
$(function() {

var $searchByIdNoForm = $('form#search-by-id-no'),
	$searchStdForm 	= 	$('.search-student-form'),
	$closeBtn 		= 	$('.close-button'),
	$searchIdNoBtn 	= 	$('.search-id-no-button'),
	$searchByIdSubmit = $('#search-by-id-submit'),
	$searchStudentForm = $('#search-student-form'),
	$searchByIdInput = $('input#search_by_id_passport'),
	$studentNameField = $('input#acf-field_5618388c2ff51'),
	$studentPassportNoField = $('input#acf-field_5612fe8fe2a39'),
	$studentPlaceOfBirth = $('input#acf-field_5612fef2fdc33'),
	$studentDateOfBirth = $('input#acf-field_5619ac69b2aab'),
	$studentNationality = $('input#acf-field_5728ffb5d7616'),
	$otherCertificates = $('.other-certificates'),
	$otherCertificatesTable = $('table.other-certificates-table'),
	$errorMessage = $('.error-message'),
	$searchSpinner = $('span.search-spinner');

function searchStudentFormFadeOut() {
	$searchStdForm.fadeOut('fast');
	$('form.acf-form input:text').first().focus();
}

function searchStudentFormFadeIn(e) {
	e.preventDefault();
	$searchStdForm.fadeIn('fast');
	$searchByIdInput.focus();
}

$searchByIdNoForm.on('click', function(event){
	event.stopPropagation();
});

$closeBtn.on('click', searchStudentFormFadeOut );

$(document).on('keyup', function(event){
	if(event.keyCode === 27) {
		searchStudentFormFadeOut();
	}
});

$searchStudentForm.on('click', searchStudentFormFadeOut);

$searchIdNoBtn.on('click', searchStudentFormFadeIn);


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

				var studentsName, passportId, placeOfBirth, nationality, dateOfBirth;

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

					} 
				});

				$studentPassportNoField.val( response.data.passport_no );

				$studentNameField.val( studentsName );

				$studentPlaceOfBirth.val( placeOfBirth );

				$studentNationality.val( nationality );

				$studentDateOfBirth.val( dateOfBirth );

				$studentDateOfBirth.next('input').val( moment( dateOfBirth ).format('MMMM D, YYYY') );

				$otherCertificatesTable.append( response.data.certificate_table );

				$otherCertificates.show();

			} else {

				$errorMessage.slideDown('fast');
				$searchSpinner.hide();
				$searchByIdSubmit.val('Try Again');

			}

		},

		error : function() {
			$searchByIdInput
				.addClass('animated shake');
			$errorMessage.text('Sorry, an error ocured. Please try again.');
			$errorMessage.slideDown('fast');
			$searchSpinner.hide();
			return;
		}
	});
}

$searchByIdNoForm.on('submit', ajaxSearchId );

function searchPassportOnLoad() {

	if ( $studentPassportNoField.val() === '' ) {
		return;
	}

	$.ajax({
		url : pmtscs_ajax_object.ajaxurl,
		type : 'POST',
		dataType : 'html',
		data : {
			action : 'load_certificates_by_passport',
			security : pmtscs_ajax_object.security,
			passport_no : $studentPassportNoField.val().toString()
		},

		success: function( response ){
			if ( response !== 0 ) {
				$otherCertificatesTable.append(response);
				$otherCertificates.show();
				return;
			} else {
				return;
			}
		},

		error: function(){
			return;
		}
	});
}

//Run the searchPassportOnlLoad function here.
searchPassportOnLoad();

});
})(jQuery); 	