; (function( $ ) {
$(function() {

	var 
		// $loader = $('.loader'),
		$editAppForm = $('.edit-application-form'),
		$editBtn = $('.edit-button'),
		$sendApplicationBtn = $('.duplicate-certificate-button'),
		$appDiv = $('.application-form'),
		$printBtn = $('.print-button'),
		$viewBtn = $('.view-button');
		// $deleteBtn = $('.void-certificate-button');
		// $gdSignature = $('.general-director'),
		// signPosition = ['left top', 'center top', 'right top'],
		// any = Math.floor(Math.random() * 3);

//Edit Quote Functionality
function fadeAppDivOut(){
	$appDiv.hide();
	$printBtn.hide();
	$editBtn.hide();
	$sendApplicationBtn.hide();
	$editAppForm.fadeIn('fast');
	$viewBtn.css('display', 'inline-block');
}

function fadeAppDivIn(){
	$viewBtn.hide();
	$appDiv.fadeIn('fast');
	$editAppForm.hide();
	$sendApplicationBtn.css('display', 'inline-block');
	$printBtn.css('display', 'inline-block');
	$editBtn.css('display', 'inline-block');
}

// function deleteApplication(event){
// 	var url = window.location.hostname + window.location.pathname + '?action=delete_application';
// 	event.preventDefault();
// 	window.confirm('Are you sure you want to delete this application?');
// 	$loader.fadeIn('fast');
// 	window.location.href = url;
// }

$editBtn.on('click', fadeAppDivOut);

$viewBtn.on('click', fadeAppDivIn);

// $deleteBtn.on('click', deleteApplication);

// $gdSignature.css('background-position', signPosition[any]);

});
})(jQuery);