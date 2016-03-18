; (function( $ ) {
$(function() {

var $govFee = $('#government-fee');
var $totalPrice = $('#total-price');
var $coursePrice = $('.course-price');


var $quotationDiv = $('.quotation');
var $editQuoteBtn = $('a.edit-quote-button');
var $printBtn = $('.print-button');
var $viewBtn = $('.view-button');
var $editQuoteForm = $('.edit-quote-form');

var totalGovFee = ($coursePrice.length * 5);

var priceArray = [];

function sumTotalGovFee(){
	return '$' + totalGovFee + '.00';	
}

function add(a, b) {
    return a + b;
}

$govFee.html( sumTotalGovFee );

for (var i = 0; i < $coursePrice.length; i++) {
	priceArray.push(Number($coursePrice[i].innerHTML.substr(1)));
}

var sum = priceArray.reduce(add, 0);

var totalPriceCourse = sum + totalGovFee;

$totalPrice.html('$' + totalPriceCourse + '.00');

//Edit Quote Functionality
function fadeQuoteDivOut(){
	$quotationDiv.hide();
	$printBtn.hide();
	$editQuoteBtn.hide();
	$editQuoteForm.fadeIn('fast');
	$viewBtn.css('display', 'inline-block');
}

function fadeQuoteDivIn(){
	$viewBtn.hide();
	$quotationDiv.fadeIn('fast');
	$editQuoteForm.hide();
	$printBtn.css('display', 'inline-block');
	$editQuoteBtn.css('display', 'inline-block');
}

$editQuoteBtn.on('click', fadeQuoteDivOut);

$viewBtn.on('click', fadeQuoteDivIn);

});
})(jQuery);