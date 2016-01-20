; (function( $ ) {
$(function() {

var certForm = 	$('.edit-certificate-form'),
	certDiv = 	$('.certificate'),
	testDiv = 	$('.the-test'),
	editBtn = 	$('.edit-button'),
	toggleBtn	=	$('a.toggle-menu'),
	$header = 	$('header'),
	$loader = $('.loader'),
	coursesList,
	$navA = $('.nav').find('li').find('a'),
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

function toggleMenu() {
	$header.toggleClass('show-menu');
	toggleBtn.toggleClass('hide-button');
}

toggleBtn.on('click', toggleMenu);

$(document).on('click', function(event) {
  if (!$(event.target).closest('header').length) {
    $header.removeClass('show-menu');
    toggleBtn.removeClass('hide-button');
  }
});

$navA.on('click', function() {
    $header.removeClass('show-menu');
    toggleBtn.removeClass('hide-button');
    $loader.show();
});


});
})(jQuery);