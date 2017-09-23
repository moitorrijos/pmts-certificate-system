var approve_quote_obj;

jQuery.noConflict();
(function( $ ) {
$(function() {

var $approveQuoteBtn 	= $('.approve-quotation'),
	$loader 			= $('.loader');

function approveQuotation() {
	var quoteID = $(this).data('post_id');

	if (window.confirm('Are you sure you want to Approve this Quotation?')) {
		$.ajax({
			type: 'POST',
			url: approve_quote_obj.ajaxurl,
			data: {
				action: 'approve_quotation_pmtscs',
				security: approve_quote_obj.security,
				quoteID: quoteID
			},
			success: function(){
				window.location = approve_quote_obj.new_app_url;
			},
			error: function(){
				$loader.fade('fast');
				$approveQuoteBtn
					.css('border', '1px solid #C1000')
					.addClass('animated shake');
			},

		});
	} else {
		$loader.fade('fast');
	}
}

$approveQuoteBtn.on('click', approveQuotation);

});
})(jQuery);  