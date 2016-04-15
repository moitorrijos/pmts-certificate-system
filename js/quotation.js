; (function( $ ) {
$(function() {

var $govFee = $('#government-fee');
var $totalPrice = $('#total-price');
var $serviceQuantity = $('#service-quanity');
var $servicePrice = $('#service-price');
var $coursePrice = $('.course-price');
var $courseQuantity = $('.course-quantity');
var $servicePriceTotal = $('td.service-price-total');

var $quotationDiv = $('.quotation');
var $editQuoteBtn = $('.edit-quote-button');
var $printBtn = $('.print-button');
var $viewBtn = $('.view-button');
var $editQuoteForm = $('.edit-quote-form');

var coursePrice = parseInt($coursePrice.html().trim().substr(1));
var serviceQuanity = parseInt($serviceQuantity.html());

var courseQuantityArray = [];
var priceArray = [];

$courseQuantity.each(function(){
	var $this = $(this);
	courseQuantityArray.push( parseInt( $this.html().trim() ) );
});

$servicePriceTotal.each(function(){
	var $this = $(this);
	priceArray.push( parseInt( $this.html().trim().replace(/,/g, '').substr(1) ) );
});


function servicePriceInline() {
	return coursePrice * serviceQuanity;
}

function add(a, b) {
    return a + b;
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

$servicePrice.html( servicePriceInline );

var govFee = courseQuantityArray.reduce(add, 0);

var totalGovFee = govFee * 5;

function sumTotalGovFee(){
	return '$' + parseInt(totalGovFee).toFixed(2);	
}

$govFee.html( sumTotalGovFee );

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