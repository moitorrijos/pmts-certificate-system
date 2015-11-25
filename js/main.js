; (function( $ ) {
$(function() {

var certForm = $('.edit-certificate-form'),
	certDiv = $('.certificate'),
	testDiv = $('.the-test'),
	editBtn = $('.edit-button'),
	coursesList,
	options = {
		valueNames : ['list-col-1', 'list-col-2', 'list-col-3']
	};

function fadeCertDivOut() {
	certDiv.fadeOut('fast');
	testDiv.fadeOut('fast');
	certForm.fadeIn();
}

editBtn.on('click', fadeCertDivOut);

coursesList = new List('search-list', options);

});
})(jQuery);