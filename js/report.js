; (function( $ ) {
$(function() {

	var $editReportForm = $('.edit-report-form');
	var $editBtn = $('.edit-button');
	var $reportDiv = $('.report');
	var $printBtn = $('.print-button');
	var $viewBtn = $('.view-button');

function certificateAmountCount() {

	var issuedCerts = $('#issued-certificates-amount');
	var trCertNumbers = $('tr#cert-number');

	issuedCerts.html( trCertNumbers.length );

}

if ( $('tr#cert-number').length ) {
	certificateAmountCount();
}

//Edit Quote Functionality
function fadeReportDivOut(){
	$reportDiv.hide();
	$printBtn.hide();
	$editBtn.hide();
	$editReportForm.fadeIn('fast');
	$viewBtn.css('display', 'inline-block');
}

function fadeReportDivIn(){
	$viewBtn.hide();
	$reportDiv.fadeIn('fast');
	$editReportForm.hide();
	$printBtn.css('display', 'inline-block');
	$editBtn.css('display', 'inline-block');
}


$editBtn.on('click', fadeReportDivOut);

$viewBtn.on('click', fadeReportDivIn);

});
})(jQuery);