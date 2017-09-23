var duplicate_quote_obj;

; (function( $ ) {
$(function() {

var $duplicateQuotationBtn = $('.duplicate-certificate-button');

$duplicateQuotationBtn.on('click', function(){
	
	var $postID = $(this).data('post_id');
	
	$.ajax({
	    type: 'POST',
	    url: duplicate_quote_obj.ajaxurl,
	    data:{
	    	action: 'duplicate_quote_pmtscs',
	    	security: duplicate_quote_obj.security,
	    	postID : $postID,
	    },
	    success: function() {
	    	window.location = duplicate_quote_obj.redirect_url;
	    },
	    error: function(){
	    	$duplicateQuotationBtn
	    		.css('border', '1px solid #C10000')
	    		.addClass('animated shake');
	    	return;
	    }
	});
});


});
})(jQuery);