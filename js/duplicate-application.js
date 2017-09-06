var duplicate_application_obj;

; (function( $ ) {
$(function() {

var $duplicateAppButton = $('#duplicate-application'),
	$loader = $('.loader'),
	$postID = $('.application-form').data('post_id');

$duplicateAppButton.on('click', function(){
	
	$loader.fadeIn('fast');

	$.ajax({
		type: 'POST',
		url: duplicate_application_obj.ajaxurl,
		data: {
			action: 'duplicate_application_pmtscs',
			security: duplicate_application_obj.security,
			postID : $postID,
		},
		success: function(){
			window.location = duplicate_application_obj.new_application_url;
		},
		error: function(){
			$duplicateAppButton
				.css('border', '1px solid #C10000')
	    		.addClass('animated shake');
	    	return;
		}
	});

});

});
})(jQuery);