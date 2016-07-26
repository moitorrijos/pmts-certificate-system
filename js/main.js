; (function( $ ) {
$(function() {

var $certForm 		= 	$('.edit-certificate-form'),
	$certDiv 		= 	$('.certificate'),
	$editBtn 		= 	$('.edit-button'),
	$toggleBtn		=	$('a.toggle-menu'),
	$header 		= 	$('header'),
	$loader 		= 	$('.loader'),
	$printBtn 		= 	$('.print-button'),
	$navA 			= 	$('.nav').find('li').find('a'),
	$viewBtn 		= 	$('.view-button'),
	$searchIdNoBtn 	= 	$('.search-id-no-button'),
	$searchStdBtn 	= 	$('.search-student-form'),
	$closeBtn 		= 	$('.close-button'),
	windowHref 		= 	window.location.href,
	acfHref 		= 	'acf-form',
	indexOfAcfHref 	= 	windowHref.lastIndexOf(acfHref),
	acfHrefReturned = 	windowHref.slice( indexOfAcfHref, windowHref.length ),
	options 		= 	{
		valueNames : ['list-col-1', 'list-col-2', 'list-col-3', 'list-col-4'],
		/*page: 75,
	    plugins: [
	      ListPagination({})
	    ]*/
	};

function fadeCertDivOut() {
	$certDiv.hide();
	$printBtn.hide();
	$editBtn.hide();
	$certForm.fadeIn('fast');
	$viewBtn.css('display', 'inline-block');
}

function fadeCertDivIn() {
	$viewBtn.hide();
	$certDiv.fadeIn('fast');
	$certForm.hide();
	$printBtn.css('display', 'inline-block');
	$editBtn.css('display', 'inline-block');
}

$editBtn.on('click', fadeCertDivOut);

$viewBtn.on('click', fadeCertDivIn);

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

function searchStudentFormFadeOut() {
	$searchStdBtn.fadeOut('fast');
}

function searchStudentFormFadeIn(e) {
	e.preventDefault();
	$searchStdBtn.fadeIn('fast');
}

$closeBtn.on('click', searchStudentFormFadeOut );

$searchIdNoBtn.on('click', searchStudentFormFadeIn);

function showLoader() {
	$header.removeClass('show-menu');
    $toggleBtn.removeClass('hide-button');
    $loader.fadeIn('fast');
    setTimeout( function(){
    	$loader.fadeOut('fast');
    } , 12000);
}

$navA.on('click', showLoader );

$('a')
.not('.not-link, .acf-button, .select2-search-choice-close, a.acf-icon')
.on('click', showLoader );

var coursesList = new List('search-list', options);

});
})(jQuery);