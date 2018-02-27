var check_object;

(function( $ ) {
$(function() {

var $checkCertificate = $('form#search-certificate-check-number-form'),
	$checkCertInput = $('input#search-certificate-check-number'),
	$errorMessage = $('span.error-message'),
	$submitButton = $('button.check-certificate-button'),
	$spinner = $('.search-spinner');

function checkCertificate(event){
	var $checkValue = $.trim( $checkCertificate.find('input.search').val() );
	event.preventDefault();
	$spinner.show();
	$.ajax({
		url 	 : check_object.ajaxurl,
		type 	 : 'POST',
		dataType : 'json',
		data 	: {
			action 	 	: 'check_certificate',
			security 	: check_object.security,
			checkValue	: $checkValue.toUpperCase(),
		},
		success : function(response){
			if (response.data === 0) {
				$spinner.hide();
				$checkCertInput
					.css('border', '1px solid #C10000')
					.addClass('animated shake');
				$errorMessage.html("The certificate was not found, please check if the Register Code is typed correctly and try again, or contact our offices for help.");
				$errorMessage.show();
				$submitButton.html('Try Again');
				return;
			}
			window.location = check_object.check_url + '?certificateId=' + response.data;
		},
		error 	: function(){
			$spinner.hide();
			$errorMessage.show();
		}
	});
}

$checkCertificate.on('submit', checkCertificate);

});
})(jQuery); 	