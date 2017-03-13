var new_invoice_object;

; (function( $ ) {
$(function() {

var $newInvoiceBtn = $('.new-invoice-button'), $loader = $('.loader');

$newInvoiceBtn.on('click', function(){

	var $postID = $newInvoiceBtn.data('post_id');

	$.ajax({
		url		: new_invoice_object.ajaxurl,
		type	: 'POST',
		// dataType : 'json',
		data	: {
			action 	: 'create_new_invoice',
			post_id : $postID,
		},
		success: function(response){
			console.log('Success', response);
			$loader.fadeOut('fast');
		},
		error: function(){
			console.log('Error');
		}
	});

});

});
})(jQuery);