; (function( $ ) {
$(function() {

	var $loginForm = $('form.cs-login-form'),
		$loginFormDiv = $('.login-form').find('.login-loading-animation'),
		$loginButton = $('input#pmtscs_wp-submit'),
		$statusMessage = $('.status-message'),
		shakeIt = 'animated shake',
		redBorder = {
						'border'	: '1px solid #C10000',
						'background': '#E34250',
						'color'		: 'white'
					};

$loginForm.on('submit', function(event){
	
	event.preventDefault();
	
	$loginFormDiv.fadeIn(450);

	$loginButton
		.css('opacity', 0.35);

	$.ajax({
		type : 'POST',
		dataType : 'json',
		url : ajax_obj.ajaxurl,
		data : {
			'action': 'ajaxlogin',
			'security': ajax_obj.security,
			'username': $('input#pmtscs_user_login').val().toString(),
			'password': $('input#pmtscs_user_pass').val().toString(),
		},
		success: function(data) {

			if ( data.loggedin === false ) {
	
				$statusMessage
					.text(data.message)
					.css(redBorder)
					.show()
					.addClass(shakeIt);
				$loginFormDiv.fadeOut(450);
				$loginButton
					.css('opacity', 1)
					.val('Try Again');

			} else {

                document.location.href = ajax_obj.redirecturl;

            }
		},

		error: function(){
			$statusMessage
			.text('Sorry an error ocurred. Please try again later.')
			.css(redBorder)
			.show();
			$loginFormDiv.fadeOut(450);
			return;
		}

	});

});

});
})(jQuery);