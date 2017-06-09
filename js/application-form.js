; (function( $ ) {
$(function() {

	var $editAppForm = $('.edit-application-form'),
		$editBtn = $('.edit-button'),
		$sendApplicationBtn = $('.duplicate-certificate-button'),
		$appDiv = $('.application-form'),
		$printBtn = $('.print-button'),
		$viewBtn = $('.view-button'),
		$gdSignature = $('.general-director'),
		signPosition = ['left top', 'center top', 'right top'],
		any = Math.floor(Math.random() * 3);

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

$editBtn.on('click', fadeAppDivOut);

$viewBtn.on('click', fadeAppDivIn);

$gdSignature.css('background-position', signPosition[any]);

});
})(jQuery);