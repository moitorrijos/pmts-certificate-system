; (function( $ ) {
$(function() {

var certForm = $('.edit-certificate-form'),
	certDiv = $('.certificate'),
	editBtn = $('.edit-button');

function fadeCertDivOut() {
	certDiv.fadeOut('fast');
	certForm.fadeIn();
}

editBtn.on('click', fadeCertDivOut);

});
})(jQuery);