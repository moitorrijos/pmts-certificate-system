; (function( $ ) {
$(function() {

var $govFee = $('#government-fee');
var $totalPrice = $('#total-price');
var $serviceQuantity = $('#service-quanity');
var $servicePrice = $('#service-price');
var $coursePrice = $('.course-price');
var $servicePriceTotal = $('td.service-price-total');

var $quotationDiv = $('.quotation');
var $editQuoteBtn = $('a.edit-quote-button');
var $printBtn = $('.print-button');
var $viewBtn = $('.view-button');
var $editQuoteForm = $('.edit-quote-form');

var coursePrice = parseInt($coursePrice.html().substr(1));
var serviceQuanity = parseInt($serviceQuantity.html());

var totalGovFee = parseInt($coursePrice.length * 5);

var priceArray = [];

function servicePriceInline() {
	return coursePrice * serviceQuanity;
}

function sumTotalGovFee(){
	return '$' + totalGovFee + '.00';	
}

function add(a, b) {
    return a + b;
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

$servicePrice.html( servicePriceInline );

$govFee.html( sumTotalGovFee );

for (var i = 0; i < $servicePriceTotal.length; i++) {
	priceArray.push(parseInt($servicePriceTotal[i].innerHTML.trim().substr(1)));
}

console.log(priceArray);

var sum = priceArray.reduce(add, 0);

var totalPriceCourse = sum + totalGovFee;

if ( $('#discount').length && $('#subtotal').length ) {
	var $subTotal = $('#subtotal');
	var discount = parseInt( $('#discount').html() );
	var subTotal = sum - ( sum * (discount / 100));
	var grandTotalPrice = subTotal + totalGovFee;

	$subTotal.html('$' + numberWithCommas( parseFloat(subTotal).toFixed(2) ) );
	$totalPrice.html('$' + numberWithCommas( parseFloat(grandTotalPrice).toFixed(2) ) );

} else {

	$totalPrice.html('$' + numberWithCommas( parseFloat(totalPriceCourse).toFixed(2) ) );

}

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