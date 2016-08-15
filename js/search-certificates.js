var certificates_object;

; (function( $ ) {
$(function() {

var $tbody 	= $('tbody'),
	$tbodytr = $('tbody tr'),
	$loader = $('.loader'),
	$searchForm = $('#search-by-id-no'),
	$searchStudentForm = $('#search-student-form'),
	$searchByIdInput = $('input#search_by_id_passport'),
	$errorMessage = $('span.error-message'),
	$notFoundMessage = $('span.not-found-message'),
	$backLink = $('a.back-link'),
	$searchSpinner = $('span.search-spinner');

$searchForm.on('submit', function(event){
	event.preventDefault();

	$searchSpinner.show();
	$loader.fadeIn('fast');

	$searchByIdInput.removeClass('animated shake');
	$errorMessage.hide();
	$notFoundMessage.hide();

	if ( $searchByIdInput.val() === '' ) {
		$searchByIdInput
			.css('border', '1px solid #C10000')
			.addClass('animated shake');
		$searchSpinner.hide();
		$loader.hide();
		return;
	}

	$.ajax({
		url		 : certificates_object.ajaxurl,
		type 	 : 'POST',
		dataType : 'json',
		data 	 : {
			action 	 	: 'search_certificates',
			security 	: certificates_object.security,
			passport_no : $searchByIdInput.val().toString()
		},
		success: function(response){

			console.log(response);

			if (response.data === '') {

			$searchSpinner.hide();
			$loader.hide();
			$notFoundMessage.fadeIn('fast');
			$searchByIdInput
				.css('border', '1px solid #C10000')
				.addClass('animated shake');

			} else {
				$searchStudentForm.fadeOut('slow');
				$searchSpinner.hide();
				$loader.hide();
				$tbodytr.remove();
				$tbody.html( response.data );
				$backLink.show();

				$searchByIdInput.css('border', '1px solid #3e94cc');
				$errorMessage.hide();
			}
		},
		error: function(){
			$loader.fadeOut('fast');
    		$searchSpinner.hide();
    		$errorMessage.fadeIn('fast');
		},
		timeout: 12000,
	});

});

});
})(jQuery); 	