; (function( $ ) {
$(function() {

	var $govFee = $('#government-fee');
	var $totalPrice = $('#total-price');
	var $serviceQuantity = $('#service-quanity');
	var $servicePrice = $('#service-price');
	var $courseQuantity = $('.course-quantity');
	var $servicePriceTotal = $('.service-price-total');

	var $quotationDiv = $('.quotation');
	var $editQuoteBtn = $('.edit-quote-button');
	var $printBtn = $('.print-button');
	var $viewBtn = $('.view-button');
	var $editQuoteForm = $('.edit-quote-form');

	var $quoteTbody = $('tr.quote-tbody');
	var $quoteFooter = $('.quote-footer');

	if ( $('.course-price').length ) {
		var $coursePrice = $('.course-price');
		var coursePrice = parseInt($coursePrice.html().trim().substr(1));
	}

	var serviceQuanity = parseInt($serviceQuantity.html());

	var courseQuantityArray = [];
	var priceArray = [];

	$courseQuantity.each(function(){
		var $this = $(this);
		courseQuantityArray.push( parseInt( $this.html().trim() ) );
	});

	$servicePriceTotal.each(function(){
		var $this = $(this);
		console.log($this.html().replace(/,/g, ''))
		priceArray.push( parseInt( $this.html().trim().replace(/,/g, '') ) );
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

	var dataGovFee = ($quoteFooter.data('govfee') === '') ? 5 : $quoteFooter.data('govfee');

	var govFee = courseQuantityArray.reduce(add, 0);

	var totalGovFee = govFee * dataGovFee;

	function sumTotalGovFee(){
		return parseInt(totalGovFee).toFixed(2);	
	}

	$govFee.html( sumTotalGovFee );

	var sum = priceArray.reduce(add, 0);

	var $subTotal = $('#subtotal');

	var subTotal = sum;

	$subTotal.html(parseFloat(sum).toFixed(2));

	var totalPriceCourse = subTotal + totalGovFee;

	if ( !$('#government-fee').length ) {

		totalPriceCourse = sum;

	} 

	if ( $('#discount').length && $('#subtotal').length ) {
		var $subTotalDiscount = $('#subtotal-discount');
		var $discount = $('#discount');
		var discount = $discount.data('discount');
		var discountSubTotal = ( sum * (discount / 100) );
		var subTotalDiscount = sum - ( sum * (discount / 100));
		var grandTotalPrice = subTotalDiscount + totalGovFee;
		//$subTotal.html(numberWithCommas( parseFloat(subTotalDiscount).toFixed(2) ) );

		$subTotalDiscount.html(numberWithCommas( parseFloat(subTotalDiscount).toFixed(2) ) );
		$discount.html('-$' + numberWithCommas( parseFloat(discountSubTotal).toFixed(2) ) );
		$totalPrice.html(numberWithCommas( parseFloat(grandTotalPrice).toFixed(2) ) );

	} else {

		$totalPrice.html(numberWithCommas( parseFloat(totalPriceCourse).toFixed(2) ) );

	}

	$quoteTbody.find('td.numbers-col').each( function( item ){
		$(this).text( item + 1 );
	});

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