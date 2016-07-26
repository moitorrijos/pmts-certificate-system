; (function( $ ) {
$(function() {

var $tbody = $('tbody'),
	$tbodytr = $('tbody tr'),
	$searchForm = $('#search-by-id-no'),
	$searchStudentForm = $('#search-student-form'),
	$searchByIdInput = $('input#search_by_id_passport'),
	$errorMessage = $('.error-message'),
	$backLink = $('a.back-link'),
	$searchSpinner = $('span.search-spinner');

$searchForm.on('submit', function(event){
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
		url		 : certificates_object.ajaxurl,
		type 	 : 'POST',
		dataType : 'json',
		data 	 : {
			action 	 	: 'search_certificates',
			security 	: certificates_object.security,
			passport_no :  $searchByIdInput.val().toString()
		},
		success: function(response){

			if (response) {

			$searchStudentForm.fadeOut('slow');
			$searchSpinner.hide();
			$tbodytr.remove();
			$tbody.html( response.data );
			$backLink.show();

			console.log(response);

			} else {
				$searchSpinner.hide();
				$errorMessage.slideDown('fast');				
			}
		}
	});

});

});
})(jQuery); 	