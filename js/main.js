; (function( $ ) {
$(function() {

var $certForm 		= 	$('.edit-section'),
	$certDiv 		= 	$('.certificate'),
	$viewBtn 		= 	$('.view-button'),
	$viewSection	= 	$('.view-section'),
	$editSection 	= 	$('.edit-section'),
	$editBtn 		= 	$('.edit-button'),
	$toggleBtn		=	$('a.toggle-menu'),
	$header 		= 	$('header'),
	$loader 		= 	$('.loader'),
	$printBtn 		= 	$('.print-button'),
	$navA 			= 	$('.nav').find('li').find('a'),
	$participantName = 	$('h1.participant-name'),
	windowHref 		= 	window.location.href,
	acfHref 		= 	'acf-form',
	indexOfAcfHref 	= 	windowHref.lastIndexOf(acfHref),
	acfHrefReturned = 	windowHref.slice( indexOfAcfHref, windowHref.length ),
	options 		= 	{
		valueNames : ['list-col-1', 'list-col-2', 'list-col-3', 'list-col-4'],
	};

function fadeViewSectionOut() {
	$viewSection.hide();
	$printBtn.hide();
	$editBtn.hide();
	$editSection.fadeIn('fast');
	$viewBtn.css('display', 'inline-block');
}

function fadeViewSectionIn() {
	$viewBtn.hide();
	$viewSection.fadeIn('fast');
	$editSection.hide();
	$printBtn.css('display', 'inline-block');
	$editBtn.css('display', 'inline-block');
}

$editBtn.on('click', fadeViewSectionOut);

$viewBtn.on('click', fadeViewSectionIn);

$printBtn.on('click', function(){
	window.print();
});

if ( acfHrefReturned === acfHref ) {
	$certDiv.hide();
	$certForm.show();
	$printBtn.hide();
	$viewBtn.css('display', 'inline-block');
	$editBtn.hide();
}

function toggleMenu() {
	$header.toggleClass('show-menu');
	$toggleBtn.toggleClass('hide-button');
}

$toggleBtn.on('click', toggleMenu);

$(document).on('click', function(event) {
  if (!$(event.target).closest('header').length) {
    $header.removeClass('show-menu');
    $toggleBtn.removeClass('hide-button');
  }
});

$('form.acf-form input:text').first().focus();

function showLoader() {
	$header.removeClass('show-menu');
    $toggleBtn.removeClass('hide-button');
    $loader.fadeIn('fast');
}

function hideLoader() {
	$loader.fadeOut('fast');
}

$navA.on('click', showLoader );

$(window).on('dblclick', hideLoader);

$('a')
.not('.not-link, .acf-button, .select2-search-choice-close, a.acf-icon')
.on('click', showLoader );

var coursesList = new List('search-list', options);

});
})(jQuery);