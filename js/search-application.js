var application_object;

; (function( $ ) {
$(function() {

var $tbody 	= $('tbody'),
	$tbodytr = $('tbody tr'),
	$loader = $('.loader'),
	$seachApplicationNumberForm = $('#search-application-number-form'),
	$searchApplicationInput = $('input#search-application-number'),
	$errorMessage = $('span.error-message'),
	$notFoundMessage = $('span.not-found-message'),
	$backLink = $('a.back-link'),
	$customPagination = $('.custom-pagination'),
	$searchSpinner = $('span.search-spinner');

	$seachApplicationNumberForm.on('submit', function(event){
		event.preventDefault();

		$searchSpinner.show();
		$loader.fadeIn('fast');

		$searchApplicationInput.removeClass('animated shake');
		$errorMessage.hide();
		$notFoundMessage.hide();

		if ( $searchApplicationInput.val() === '' ) {
			$searchApplicationInput
				.css('border', '1px solid #C10000')
				.addClass('animated shake');
			$searchSpinner.hide();
			$loader.hide();
			return;
		}

		$.ajax({
			url			: application_object.ajaxurl,
			type		: 'POST',
			dataType 	: 'json',
			data 		: {
				action 		 : 'search_application',
				security 	 : application_object.security,
				application_no  : $searchApplicationInput.val().toString()
			},

			success: function(response){

				if (response.data === '') {

					$searchSpinner.hide();
					$loader.hide();
					$notFoundMessage.fadeIn('fast');
					$searchApplicationInput
						.css('border', '1px solid #C10000')
						.addClass('animated shake');

				} else {
					$searchSpinner.hide();
					$loader.hide();
					$backLink.show();
					$tbodytr.remove();
					$tbody.html( response.data );

					$searchApplicationInput.css('border', '1px solid #3e94cc');
					$errorMessage.hide();
					$customPagination.hide();
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