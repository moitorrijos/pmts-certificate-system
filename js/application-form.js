; (function( $ ) {
$(function() {

	var $editAppForm = $('.edit-application-form');
	var $editBtn = $('.edit-button');
	var $appDiv = $('.application-form');
	var $printBtn = $('.print-button');
	var $viewBtn = $('.view-button');

//Edit Quote Functionality
function fadeAppDivOut(){
	$appDiv.hide();
	$printBtn.hide();
	$editBtn.hide();
	$editAppForm.fadeIn('fast');
	$viewBtn.css('display', 'inline-block');
}

function fadeAppDivIn(){
	$viewBtn.hide();
	$appDiv.fadeIn('fast');
	$editAppForm.hide();
	$printBtn.css('display', 'inline-block');
	$editBtn.css('display', 'inline-block');
}


$editBtn.on('click', fadeAppDivOut);

$viewBtn.on('click', fadeAppDivIn);

});
})(jQuery);