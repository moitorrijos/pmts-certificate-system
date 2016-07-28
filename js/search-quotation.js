; (function( $ ) {
$(function() {

var $tbody 	= $('tbody'),
	$tbodytr = $('tbody tr'),
	$loader = $('.loader'),
	$searchQuotationForm = $('#search-quotation-number-form'),
	$searchQuotationInput = $('input#search-quotation-number'),
	$errorMessage = $('span.error-message'),
	$backLink = $('a.back-link'),
	$searchSpinner = $('span.search-spinner');

	$searchQuotationForm.on('submit', function(event){
		event.preventDefault();

		$searchSpinner.show();
		$loader.fadeIn('fast');

		if ( $searchQuotationInput.val() === '' ) {
			$searchQuotationInput
				.css('border', '1px solid #C10000')
				.addClass('animated shake');
			$searchSpinner.hide();
			$loader.hide();
			return;
		}

		$searchQuotationInput.removeClass('animated shake');

		$.ajax({
			url			: quotation_object.ajaxurl,
			type		: 'POST',
			dataType 	: 'json',
			data 		: {
				action 		 : 'search_quotations',
				security 	 : quotation_object.security,
				quotation_no : $searchQuotationInput.val().toString()
			},

			success: function(response){

				console.log(response);

				if (response) {

					$searchSpinner.hide();
					$loader.hide();
					$backLink.show();
					$tbodytr.remove();
					$tbody.html( response.data );

					$searchQuotationInput.css('border', '1px solid #3e94cc');
					$errorMessage.hide();

				} else {
					$searchSpinner.hide();
					$loader.hide();
					$errorMessage.fadeIn('fast');
					$searchQuotationInput
						.css('border', '1px solid #C10000')
						.addClass('animated shake');
				}
			}

		});
	});

});
})(jQuery); 	