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
				setTimeout( function(){ $applicationSentDiv.velocity('slideDown', {duration: 100}); }, 10);
			} else {
				$loader.fadeOut('fast');
				setTimeout( function(){ $applicationSentErrorDiv.velocity('slideDown', {duration: 100}); }, 10);
			}
		},
		error: function(){
			$loader.fadeOut('fast');
			$applicationSentErrorDiv.velocity('slideDown', {duration: 100});
		},
	});
}

$sendApplicationBtn.on('click', sendApplication);

});
})(jQuery); 	