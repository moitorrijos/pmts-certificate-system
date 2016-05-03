; (function( $ ) {
$(function() {

var $searchByIdNoForm = $('#search-by-id-no'),
	$searchByIdSubmit = $('#search-by-id-submit'),
	$searchStudentForm = $('#search-student-form'),
	$searchByIdInput = $('input#search_by_id_passport'),
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
			$searchSpinner.hide();
			$searchByIdSubmit.val('Done');
			$searchStudentForm.fadeOut('slow');
		},

		error : function( error ) {
			$searchByIdInput
				.addClass('animated shake');
			$searchSpinner.hide();
			console.log( error );
			return;
		}
	});
}

$searchByIdNoForm.on('submit', ajaxSearchId );

});
})(jQuery); 	