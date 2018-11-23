var delete_app_obj;

jQuery.noConflict();
(function( $ ) {
$(function() {

var
	$modalBox = $('.modal-box'),
	$loader = $('.loader');

function deleteApplication(event) {
	var appID = $(this).data('id');
	var url = window.location.href;
	event.preventDefault();
	if ( window.confirm('Are you sure you want to delete this application?') ) {
		// fire ajax
		$loader.fadeIn('fast');
		$.ajax({
			url : delete_app_obj.ajaxurl,
			type : 'POST',
			dataType: 'json',
			data: {
				action : 'delete_application',
				security : delete_app_obj.security,
				appID: appID
			},
			success: function(response){
				if (response.success) {
					window.location = url;
				} else {
					$loader.fadeOut('fast');
				}
			},
			error: function(){
				$loader.fadeOut('fast');
			},
			timeout: 12000,
		});
	} else {
		return;
	}
}

if ($modalBox) {
	$modalBox.addClass('animate-me-in');
	window.setTimeout( function(){ $modalBox.addClass('animate-me-out'); }, 4000);
}

$(document).on('click', '.delete-form', deleteApplication);

});
})(jQuery);  