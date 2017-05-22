var send_application_obj;

jQuery.noConflict();
(function( $ ) {
$(function() {

var $sendApplicationBtn = $('.duplicate-certificate-button'),
	$applicationForm = $('.application-form'),
	$applicationSentDiv = $('.application-sent'),
	$applicationSentErrorDiv = $('.application-sent-error'),
	$loader = $('.loader');

function sendApplication(){
	var $appPostID = $applicationForm.data('post_id');
	
	$.ajax({
		type: 'POST',
		url: send_application_obj.ajaxurl,
		data: {
			action: 'send_application_pmtscs',
			security: send_application_obj.security,
			appPostID: $appPostID,
		},
		success: function(response){
			if ( response.success ){
				$loader.fadeOut('fast');
				// $applicationSentDiv.show();
				setTimeout( function(){ $applicationSentDiv.slideDown('fast'); }, 10);
			} else {
				$loader.fadeOut('fast');
				// $applicationSentErrorDiv.show();
				setTimeout( function(){ $applicationSentErrorDiv.slideDown('fast'); }, 10);
			}
		},
		error: function(){
			$loader.fadeOut('fast');
			$applicationSentErrorDiv.show();
			$applicationSentErrorDiv.addClass('translate-down');
		},
	});
}

$sendApplicationBtn.on('click', sendApplication);

});
})(jQuery); 	